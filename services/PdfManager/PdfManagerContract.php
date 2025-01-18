<?php

namespace Service\PdfManager;



use Symfony\Component\HttpFoundation\File\File;

interface PdfManagerContract
{
      public function storePdfFromRequest(File $pdf, $name);

      public function getAllPathPdfFromDB(): string;

}
