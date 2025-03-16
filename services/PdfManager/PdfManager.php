<?php

namespace Service\PdfManager;

use App\Models\Collaboration;

use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\File;

/**
 * This function store pdf file from request and return a relative pathName
 */
class PdfManager implements PdfManagerContract
{

//    public function storePdfFromRequest( File $pdf, $name): string
//    {
//        $path = public_path('Curriculum');
//
//        if (!file_exists($path)) {
//            mkdir($path, 0777, true);
//        }
//
//        $pathName = $pdf->move($path, $name.'CV.pdf')->getPathname();
//
//
//        $relativePath = Str::afterLast($pathName, 'Curriculum');
//
//
//        $formattedPath = str_replace('\\', '/', $relativePath);
//
//
//        return  $formattedPath;
//    }

    public function storePdfFromRequest(File $pdf, $name): string
    {
        $path = public_path('Curriculum');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $fileName = $this->generateUniqueFileName($path, $name);
        $pathName = $pdf->move($path, $fileName)->getPathname();
        $relativePath = Str::afterLast($pathName, 'Curriculum');
        $formattedPath = str_replace('\\', '/', $relativePath);

        return $formattedPath;
    }

    public function getAllPathPdfFromDB(): string
    {
        return Collaboration::all('curriculum')->toJson();
    }

    public function deletePdfFile($pdfPathStored): string
    {
        $prefixPath = public_path('Curriculum');

        $concatPath = $prefixPath.$pdfPathStored;

        if (file_exists($concatPath)) {
            unlink($concatPath);

            return true;
        }

        return false;
    }
    private function generateUniqueFileName(string $path, string $name): string
    {
        $fileName = $name . 'CV.pdf';
        $filePath = $path . '/' . $fileName;

        $counter = 1;
        while (file_exists($filePath)) {
            $fileName = $name . 'CV_' . $counter . '.pdf';
            $filePath = $path . '/' . $fileName;
            $counter++;
        }

        return $fileName;
    }
}
