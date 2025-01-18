<?php

namespace Service\PdfManager\Facade;

use Illuminate\Support\Facades\Facade;
use Service\PdfManager\PdfManagerContract;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @method static storePdfFromRequest(File $pdf, $name):string;
 * @method static getAllPathPdfFromDB():string;
 */
class PdfManagerFacade extends Facade
{
  protected static function getFacadeAccessor(): string
  {
      return PdfManagerContract::class;
  }
}
