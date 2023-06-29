<?
namespace App\Core\Exception;

class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $message = "INTERDIT PAR DICI TDC";
    
}