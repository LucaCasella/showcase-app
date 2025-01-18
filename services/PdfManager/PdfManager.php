<?php

namespace Service\PdfManager;

use App\Models\Collaboration;

use Symfony\Component\HttpFoundation\File\File;

class PdfManager implements PdfManagerContract
{

    public function storePdfFromRequest( File $pdf, $name): string
    {
        $path = public_path('Curriculum');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $pathName = $pdf->move($path, $name.'cv.pdf')->getPathname();

        return  $pathName;
    }

    public function getAllPathPdfFromDB(): string
    {
        return Collaboration::all('curriculum')->toJson();
    }
}
