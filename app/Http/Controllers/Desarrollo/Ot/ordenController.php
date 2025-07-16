<?php

namespace App\Http\Controllers\Desarrollo\Ot;

use App\Models\Ots;
use App\Models\User;
use App\Models\Estado;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Route;
class ordenController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Ot.listaOT', compact('nameRoute'));
    }


    public function getOts()
    {
        $ots = Ots::with('estados', 'users' ,'cliente')->get();
        return response()->json(['data' => $ots]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = Estado::whereIn('id',[10,9,8])->get();
        $ejecutivos = User::where('roles_id',operator: 6)->get();
        $nameRoute = Route::currentRouteName();
        return view('Desarrollo.Ot.crearOT', compact('nameRoute','ejecutivos','estados'));
    }

    /**
     * Download an excel file.
     * */

    public function downloadExcel()
    {

        $file_excel = new Spreadsheet();
        $sheet = $file_excel -> getActiveSheet();

        $sheet->setCellValue('A1','Área');
        $sheet->setCellValue('B1','Horas contratadas');
        $sheet->setCellValue('C1','Horas consumidas');
        $sheet->setCellValue('D1','Diferencia');

        $data = [
            ['Área' => 'Marketing', 'Horas Contratadas' => 100, 'Horas Consumidas' => 85],
            ['Área' => 'Desarrollo', 'Horas Contratadas' => 200, 'Horas Consumidas' => 190],
            ['Área' => 'Soporte', 'Horas Contratadas' => 150, 'Horas Consumidas' => 140],
        ];

        $row = 2;
        foreach($data as $item)
        {
            $sheet->setCellValue('A' . $row, $item['Área']); // Columna A
            $sheet->setCellValue('B' . $row, $item['Horas Contratadas']); // Columna B
            $sheet->setCellValue('C' . $row, $item['Horas Consumidas']); // Columna C
            $sheet->setCellValue('D' . $row, $item['Horas Contratadas'] - $item['Horas Consumidas']); // Diferencia en Columna D
            $row++;
        }

        $sheet->setCellValue('A' . $row, 'Total');
        $sheet->setCellValue('B' . $row, '=SUM(B2:B' . ($row - 1) . ')');
        $sheet->setCellValue('C' . $row, '=SUM(C2:C' . ($row - 1) . ')');
        $sheet->setCellValue('D' . $row, '=SUM(D2:D' . ($row - 1) . ')');

        $writer = new Xlsx($file_excel);
        $fileName = "ReporteMensual.xlsx";

        return new StreamedResponse(function() use ($writer){
            $writer->save('php://output');
        },200,[
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $message = [];

        $request->merge([
            'valor' => str_replace('.','',$request->input('vl-ot'))
        ]);

        $validateData = $request->validate([
            'nm-ot' => 'required|string|max:115',
            'es-ot' => 'required|numeric|exists:ots,estados_id',
            'cl-ot' => 'required|numeric|exists:ots,clientes_id',
            'f-ot' => 'required|boolean',
            'py-ot'=> 'required|max:225',
            'vl-ot' => 'required|integer|min:1|max:9999999999',
            'ej-ot' => 'required|numeric|exists:ots,users_id',
            'hr-ot' => 'required|',
            'fh-ot' => 'required|date',
            'ff-ot' => 'required|date'
         ]);

         $create_ots = Ots::create([
            'numero_ot' => $validateData['nm-ot'],
            'estados_id' => $validateData['es-ot'],
            'clientes_id' => $validateData['cl-ot'],
            'fee' => $validateData['f-ot'],
            'py-ot' => $validateData['py-ot'],
            'valor' => $validateData['vl-ot'],
            'users_id' => $validateData['ej-ot'],
            'horas_totales' => $validateData['hr-ot'],
            'fecha_inicio' => $validateData['fh-ot'],
            'fecha_fin' => $validateData['ff-ot']

            // PENDIENTE POR HACER


         ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
