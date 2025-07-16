/*
 * bootstrap-tagsinput v0.8.0
 *
 */

(function ($) {
    "use strict";

    var defaultOptions = {
      tagClass: function(item) {
        return 'label label-info';
      },
      focusClass: 'focus',
      itemValue: function(item) {
        return item ? item.toString() : item;
      },
      itemText: function(item) {
        return this.itemValue(item);
      },
      itemTitle: function(item) {
        return null;
      },
      freeInput: true,
      addOnBlur: true,
      maxTags: undefined,
      maxChars: undefined,
      confirmKeys: [13, 44],
      delimiter: ',',
      delimiterRegex: null,
      cancelConfirmKeysOnEmpty: false,
      onTagExists: function(item, $tag) {
        $tag.hide().fadeIn();
      },
      trimValue: false,
      allowDuplicates: false,
      triggerChange: true
    };

    /**
     * Función constructora
     */
    function TagsInput(element, options) {
      this.isInit = true;
      this.itemsArray = [];

      this.$element = $(element);
      this.$element.hide();

      this.isSelect = (element.tagName === 'SELECT');
      this.multiple = (this.isSelect && element.hasAttribute('multiple'));
      this.objectItems = options && options.itemValue;
      this.placeholderText = element.hasAttribute('placeholder') ? this.$element.attr('placeholder') : '';
      this.inputSize = Math.max(1, this.placeholderText.length);

      this.$container = $('<div class="bootstrap-tagsinput"></div>');
      this.$input = $('<input type="text" placeholder="' + this.placeholderText + '"/>').appendTo(this.$container);

      this.$element.before(this.$container);

      this.build(options);
      this.isInit = false;
    }

    TagsInput.prototype = {
      constructor: TagsInput,

      /**
       * Añade el elemento dado como una nueva etiqueta. Pasa true a dontPushVal para evitar
       * actualizar el val() de los elementos
       */
      add: function(item, dontPushVal, options) {
        var self = this;

        if (self.options.maxTags && self.itemsArray.length >= self.options.maxTags)
          return;

        // Ignorar valores falsos, excepto false
        if (item !== false && !item)
          return;

        // Recortar valor
        if (typeof item === "string" && self.options.trimValue) {
          item = $.trim(item);
        }

        // Lanzar un error cuando se intenta añadir un objeto mientras la opción itemValue no está establecida
        if (typeof item === "object" && !self.objectItems)
          throw("No se pueden añadir objetos cuando la opción itemValue no está establecida");

        // Ignorar cadenas que solo contienen espacios en blanco
        if (item.toString().match(/^\s*$/))
          return;

        // Si es SELECT pero no múltiple, eliminar la etiqueta actual
        if (self.isSelect && !self.multiple && self.itemsArray.length > 0)
          self.remove(self.itemsArray[0]);

        if (typeof item === "string" && this.$element[0].tagName === 'INPUT') {
          var delimiter = (self.options.delimiterRegex) ? self.options.delimiterRegex : self.options.delimiter;
          var items = item.split(delimiter);
          if (items.length > 1) {
            for (var i = 0; i < items.length; i++) {
              this.add(items[i], true);
            }

            if (!dontPushVal)
              self.pushVal(self.options.triggerChange);
            return;
          }
        }

        var itemValue = self.options.itemValue(item),
            itemText = self.options.itemText(item),
            tagClass = self.options.tagClass(item),
            itemTitle = self.options.itemTitle(item);

        // Ignorar elementos ya añadidos
        var existing = $.grep(self.itemsArray, function(item) { return self.options.itemValue(item) === itemValue; } )[0];
        if (existing && !self.options.allowDuplicates) {
          // Invocar onTagExists
          if (self.options.onTagExists) {
            var $existingTag = $(".tag", self.$container).filter(function() { return $(this).data("item") === existing; });
            self.options.onTagExists(item, $existingTag);
          }
          return;
        }

        // si la longitud es mayor que el límite
        if (self.items().toString().length + item.length + 1 > self.options.maxInputLength)
          return;

        // levantar evento beforeItemAdd
        var beforeItemAddEvent = $.Event('beforeItemAdd', { item: item, cancel: false, options: options});
        self.$element.trigger(beforeItemAddEvent);
        if (beforeItemAddEvent.cancel)
          return;

        // registrar elemento en array interno y mapa
        self.itemsArray.push(item);

        // añadir un elemento de etiqueta

        var $tag = $('<span class="tag ' + htmlEncode(tagClass) + (itemTitle !== null ? ('" title="' + itemTitle) : '') + '">' + htmlEncode(itemText) + '<span data-role="remove"></span></span>');
        $tag.data('item', item);
        self.findInputWrapper().before($tag);
        $tag.after(' ');

        // Comprobar si la etiqueta existe en su forma original o codificada en URI
        var optionExists = (
          $('option[value="' + encodeURIComponent(itemValue) + '"]', self.$element).length ||
          $('option[value="' + htmlEncode(itemValue) + '"]', self.$element).length
        );

        // añadir <option /> si el elemento representa un valor no presente en una de las opciones de <select />
        if (self.isSelect && !optionExists) {
          var $option = $('<option selected>' + htmlEncode(itemText) + '</option>');
          $option.data('item', item);
          $option.attr('value', itemValue);
          self.$element.append($option);
        }

        if (!dontPushVal)
          self.pushVal(self.options.triggerChange);

        // Añadir clase cuando se alcanza maxTags
        if (self.options.maxTags === self.itemsArray.length || self.items().toString().length === self.options.maxInputLength)
          self.$container.addClass('bootstrap-tagsinput-max');

        // Si se utiliza typeahead, una vez que se ha añadido la etiqueta, borrar el valor de typeahead para que no permanezca en la entrada.
        if ($('.typeahead, .twitter-typeahead', self.$container).length) {
          self.$input.typeahead('val', '');
        }

        if (this.isInit) {
          self.$element.trigger($.Event('itemAddedOnInit', { item: item, options: options }));
        } else {
          self.$element.trigger($.Event('itemAdded', { item: item, options: options }));
        }
      },

      /**
       * Elimina el elemento dado. Pasa true a dontPushVal para evitar actualizar
       * el val() de los elementos
       */
      remove: function(item, dontPushVal, options) {
        var self = this;

        if (self.objectItems) {
          if (typeof item === "object")
            item = $.grep(self.itemsArray, function(other) { return self.options.itemValue(other) ==  self.options.itemValue(item); } );
          else
            item = $.grep(self.itemsArray, function(other) { return self.options.itemValue(other) ==  item; } );

          item = item[item.length-1];
        }

        if (item) {
          var beforeItemRemoveEvent = $.Event('beforeItemRemove', { item: item, cancel: false, options: options });
          self.$element.trigger(beforeItemRemoveEvent);
          if (beforeItemRemoveEvent.cancel)
            return;

          $('.tag', self.$container).filter(function() { return $(this).data('item') === item; }).remove();
          $('option', self.$element).filter(function() { return $(this).data('item') === item; }).remove();
          if($.inArray(item, self.itemsArray) !== -1)
            self.itemsArray.splice($.inArray(item, self.itemsArray), 1);
        }

        if (!dontPushVal)
          self.pushVal(self.options.triggerChange);

        // Eliminar clase cuando se alcanza maxTags
        if (self.options.maxTags > self.itemsArray.length)
          self.$container.removeClass('bootstrap-tagsinput-max');

        self.$element.trigger($.Event('itemRemoved',  { item: item, options: options }));
      },

      /**
       * Elimina todos los elementos
       */
      removeAll: function() {
        var self = this;

        $('.tag', self.$container).remove();
        $('option', self.$element).remove();

        while(self.itemsArray.length > 0)
          self.itemsArray.pop();

        self.pushVal(self.options.triggerChange);
      },

      /**
       * Actualiza las etiquetas para que coincidan con el texto/valor de su
       * elemento correspondiente.
       */
      refresh: function() {
        var self = this;
        $('.tag', self.$container).each(function() {
          var $tag = $(this),
              item = $tag.data('item'),
              itemValue = self.options.itemValue(item),
              itemText = self.options.itemText(item),
              tagClass = self.options.tagClass(item);

            // Actualizar la clase y el texto interno de la etiqueta
            $tag.attr('class', null);
            $tag.addClass('tag ' + htmlEncode(tagClass));
            $tag.contents().filter(function() {
              return this.nodeType == 3;
            })[0].nodeValue = htmlEncode(itemText);

            if (self.isSelect) {
              var option = $('option', self.$element).filter(function() { return $(this).data('item') === item; });
              option.attr('value', itemValue);
            }
        });
      },

      /**
       * Devuelve los elementos añadidos como etiquetas
       */
      items: function() {
        return this.itemsArray;
      },

      /**
       * Ensambla el valor recuperando el valor de cada elemento, y lo establece en el
       * elemento.
       */
      pushVal: function() {
        var self = this,
            val = $.map(self.items(), function(item) {
              return self.options.itemValue(item).toString();
            });

        self.$element.val(val, true);

        if (self.options.triggerChange)
          self.$element.trigger('change');
      },

      /**
       * Inicializa el comportamiento de entrada de etiquetas en el elemento
       */
      build: function(options) {
        var self = this;

        self.options = $.extend({}, defaultOptions, options);
        // Cuando itemValue está establecido, freeInput siempre debe ser false
        if (self.objectItems)
          self.options.freeInput = false;

        makeOptionItemFunction(self.options, 'itemValue');
        makeOptionItemFunction(self.options, 'itemText');
        makeOptionFunction(self.options, 'tagClass');

        // Typeahead Bootstrap versión 2.3.2
        if (self.options.typeahead) {
          var typeahead = self.options.typeahead || {};

          makeOptionFunction(typeahead, 'source');

          self.$input.typeahead($.extend({}, typeahead, {
            source: function (query, process) {
              function processItems(items) {
                var texts = [];

                for (var i = 0; i < items.length; i++) {
                  var text = self.options.itemText(items[i]);
                  map[text] = items[i];
                  texts.push(text);
                }
                process(texts);
              }

              this.map = {};
              var map = this.map,
                  data = typeahead.source(query);

              if ($.isFunction(data.success)) {
                // soporte para callbacks de Angular
                data.success(processItems);
              } else if ($.isFunction(data.then)) {
                // soporte para promesas de Angular
                data.then(processItems);
              } else {
                // soporte para funciones y promesas jquery
                $.when(data)
                 .then(processItems);
              }
            },
            updater: function (text) {
              self.add(this.map[text]);
              return this.map[text];
            },
            matcher: function (text) {
              return (text.toLowerCase().indexOf(this.query.trim().toLowerCase()) !== -1);
            },
            sorter: function (texts) {
              return texts.sort();
            },
            highlighter: function (text) {
              var regex = new RegExp( '(' + this.query + ')', 'gi' );
              return text.replace( regex, "<strong>$1</strong>" );
            }
          }));
        }

        // typeahead.js
        if (self.options.typeaheadjs) {

            // Determinar si se pasaron configuraciones principales o simplemente un conjunto de datos
            var typeaheadjs = self.options.typeaheadjs;
            if (!$.isArray(typeaheadjs)) {
                typeaheadjs = [null, typeaheadjs];
            }
            var valueKey = typeaheadjs[1].valueKey; // Deberíamos probar typeaheadjs.size >= 1
            var f_datum = valueKey ? function (datum) { return datum[valueKey];  }
                                   : function (datum) {  return datum;  }
            $.fn.typeahead.apply(self.$input,typeaheadjs).on('typeahead:selected', $.proxy(function (obj, datum) {
                self.add( f_datum(datum) );
                self.$input.typeahead('val', '');
              }, self));

        }

        self.$container.on('click', $.proxy(function(event) {
          if (! self.$element.attr('disabled')) {
            self.$input.removeAttr('disabled');
          }
          self.$input.focus();
        }, self));

          if (self.options.addOnBlur && self.options.freeInput) {
            self.$input.on('focusout', $.proxy(function(event) {
                // HACK: solo procesar en focusout cuando no hay typeahead abierto, para
                //       evitar añadir el texto typeahead como etiqueta
                if ($('.typeahead, .twitter-typeahead', self.$container).length === 0) {
                  self.add(self.$input.val());
                  self.$input.val('');
                }
            }, self));
          }

        // Alternar la clase css 'focus' en el contenedor cuando tiene foco
        self.$container.on({
          focusin: function() {
            self.$container.addClass(self.options.focusClass);
          },
          focusout: function() {
            self.$container.removeClass(self.options.focusClass);
          },
        });

        self.$container.on('keydown', 'input', $.proxy(function(event) {
          var $input = $(event.target),
              $inputWrapper = self.findInputWrapper();

          if (self.$element.attr('disabled')) {
            self.$input.attr('disabled', 'disabled');
            return;
          }

          switch (event.which) {
            // RETROCESO
            case 8:
              if (doGetCaretPosition($input[0]) === 0) {
                var prev = $inputWrapper.prev();
                if (prev.length) {
                  self.remove(prev.data('item'));
                }
              }
              break;

            // SUPRIMIR
            case 46:
              if (doGetCaretPosition($input[0]) === 0) {
                var next = $inputWrapper.next();
                if (next.length) {
                  self.remove(next.data('item'));
                }
              }
              break;

            // FLECHA IZQUIERDA
            case 37:
              // Intentar mover la entrada antes de la etiqueta anterior
              var $prevTag = $inputWrapper.prev();
              if ($input.val().length === 0 && $prevTag[0]) {
                $prevTag.before($inputWrapper);
                $input.focus();
              }
              break;
            // FLECHA DERECHA
            case 39:
              // Intentar mover la entrada después de la siguiente etiqueta
              var $nextTag = $inputWrapper.next();
              if ($input.val().length === 0 && $nextTag[0]) {
                $nextTag.after($inputWrapper);
                $input.focus();
              }
              break;
           default:
               // ignorar
           }

          // Restablecer el tamaño interno de la entrada
          var textLength = $input.val().length,
              wordSpace = Math.ceil(textLength / 5),
              size = textLength + wordSpace + 1;
          $input.attr('size', Math.max(this.inputSize, $input.val().length));
        }, self));

        self.$container.on('keypress', 'input', $.proxy(function(event) {
           var $input = $(event.target);

           if (self.$element.attr('disabled')) {
              self.$input.attr('disabled', 'disabled');
              return;
           }

           var text = $input.val(),
           maxLengthReached = self.options.maxChars && text.length >= self.options.maxChars;
           if (self.options.freeInput && (keyCombinationInList(event, self.options.confirmKeys) || maxLengthReached)) {
              // Solo intentar añadir una etiqueta si hay datos en el campo
              if (text.length !== 0) {
                 self.add(maxLengthReached ? text.substr(0, self.options.maxChars) : text);
                 $input.val('');
              }

              // Si el campo está vacío, deja que el evento se active como de costumbre
              if (self.options.cancelConfirmKeysOnEmpty === false) {
                  event.preventDefault();
              }
           }

           // Restablecer el tamaño interno de la entrada
           var textLength = $input.val().length,
              wordSpace = Math.ceil(textLength / 5),
              size = textLength + wordSpace + 1;
           $input.attr('size', Math.max(this.inputSize, $input.val().length));
        }, self));

        // Icono de eliminar pulsado
        self.$container.on('click', '[data-role=remove]', $.proxy(function(event) {
          if (self.$element.attr('disabled')) {
            return;
          }
          self.remove($(event.target).closest('.tag').data('item'));
        }, self));

        // Solo añadir valor existente como etiquetas cuando se usan cadenas como etiquetas
        if (self.options.itemValue === defaultOptions.itemValue) {
          if (self.$element[0].tagName === 'INPUT') {
              self.add(self.$element.val());
          } else {
            $('option', self.$element).each(function() {
              self.add($(this).attr('value'), true);
            });
          }
        }
      },

      /**
       * Elimina todo el comportamiento tagsinput y anula el registro de todos los controladores de eventos
       */
      destroy: function() {
        var self = this;

        // Desenlazar eventos
        self.$container.off('keypress', 'input');
        self.$container.off('click', '[role=remove]');

        self.$container.remove();
        self.$element.removeData('tagsinput');
        self.$element.show();
      },

      /**
       * Establece el foco en el tagsinput
       */
      focus: function() {
        this.$input.focus();
      },

      /**
       * Devuelve el elemento de entrada interno
       */
      input: function() {
        return this.$input;
      },

      /**
       * Devuelve el elemento que está envuelto alrededor de la entrada interna. Este
       * es normalmente el $container, pero typeahead.js mueve el elemento $input.
       */
      findInputWrapper: function() {
        var elt = this.$input[0],
            container = this.$container[0];
        while(elt && elt.parentNode !== container)
          elt = elt.parentNode;

        return $(elt);
      }
    };

    /**
     * Registrar plugin JQuery
     */
    $.fn.tagsinput = function(arg1, arg2, arg3) {
      var results = [];

      this.each(function() {
        var tagsinput = $(this).data('tagsinput');
        // Inicializar una nueva entrada de etiquetas
        if (!tagsinput) {
            tagsinput = new TagsInput(this, arg1);
            $(this).data('tagsinput', tagsinput);
            results.push(tagsinput);

            if (this.tagName === 'SELECT') {
                $('option', $(this)).attr('selected', 'selected');
            }

            // Inicializar etiquetas desde $(this).val()
            $(this).val($(this).val());
        } else if (!arg1 && !arg2) {
            // tagsinput ya existe
            // sin función, intentando inicializar
            results.push(tagsinput);
        } else if(tagsinput[arg1] !== undefined) {
            // Invocar función en la entrada de etiquetas existente
              if(tagsinput[arg1].length === 3 && arg3 !== undefined){
                 var retVal = tagsinput[arg1](arg2, null, arg3);
              }else{
                 var retVal = tagsinput[arg1](arg2);
              }
            if (retVal !== undefined)
                results.push(retVal);
        }
      });

      if ( typeof arg1 == 'string') {
        // Devolver los resultados de las llamadas a funciones invocadas
        return results.length > 1 ? results : results[0];
      } else {
        return results;
      }
    };

    $.fn.tagsinput.Constructor = TagsInput;

    /**
     * La mayoría de las opciones admiten tanto una cadena o número como una función como
     * valor de opción. Esta función asegura que la opción con la clave dada
     * en las opciones dadas esté envuelta en una función
     */
    function makeOptionItemFunction(options, key) {
      if (typeof options[key] !== 'function') {
        var propertyName = options[key];
        options[key] = function(item) { return item[propertyName]; };
      }
    }
    function makeOptionFunction(options, key) {
      if (typeof options[key] !== 'function') {
        var value = options[key];
        options[key] = function() { return value; };
      }
    }
    /**
     * Codifica en HTML el valor dado
     */
    var htmlEncodeContainer = $('<div />');
    function htmlEncode(value) {
      if (value) {
        return htmlEncodeContainer.text(value).html();
      } else {
        return '';
      }
    }

    /**
     * Devuelve la posición del cursor en el campo de entrada dado
     * http://flightschool.acylt.com/devnotes/caret-position-woes/
     */
    function doGetCaretPosition(oField) {
      var iCaretPos = 0;
      if (document.selection) {
        oField.focus ();
        var oSel = document.selection.createRange();
        oSel.moveStart ('character', -oField.value.length);
        iCaretPos = oSel.text.length;
      } else if (oField.selectionStart || oField.selectionStart == '0') {
        iCaretPos = oField.selectionStart;
      }
      return (iCaretPos);
    }

    /**
      * Devuelve un booleano que indica si el usuario ha pulsado una combinación de teclas esperada.
      * @param object keyPressEvent: objeto de evento JavaScript, consultar
      *     http://www.w3.org/TR/2003/WD-DOM-Level-3-Events-20030331/ecma-script-binding.html
      * @param object lookupList: combinaciones de teclas esperadas, como en:
      *     [13, {which: 188, shiftKey: true}]
      */
    function keyCombinationInList(keyPressEvent, lookupList) {
        var found = false;
        $.each(lookupList, function (index, keyCombination) {
            if (typeof (keyCombination) === 'number' && keyPressEvent.which === keyCombination) {
                found = true;
                return false;
            }

            if (keyPressEvent.which === keyCombination.which) {
                var alt = !keyCombination.hasOwnProperty('altKey') || keyPressEvent.altKey === keyCombination.altKey,
                    shift = !keyCombination.hasOwnProperty('shiftKey') || keyPressEvent.shiftKey === keyCombination.shiftKey,
                    ctrl = !keyCombination.hasOwnProperty('ctrlKey') || keyPressEvent.ctrlKey === keyCombination.ctrlKey;
                if (alt && shift && ctrl) {
                    found = true;
                    return false;
                }
            }
        });

        return found;
    }

    /**
     * Inicializar el comportamiento tagsinput en entradas y selects que tienen
     * data-role=tagsinput
     */
    $(function() {
      $("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput();
    });
  })(window.jQuery);
