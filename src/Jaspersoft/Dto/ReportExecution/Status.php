<?php
/**
 * @author Grant Bacon (gbacon@jaspersoft.com)
 */

namespace Jaspersoft\Dto\ReportExecution;

use Jaspersoft\Dto\DTOObject;

class Status extends DTOObject {

    /**
     * The status of the report
     * "queued" "ready" "failed", etc.
     *
     * @var string
     */
    private $value;

    /**
     * A description of an error which occurred during execution
     *
     * @var Object
     */
    private $errorDescriptor;


    public static function createFromJSON($json_obj)
    {
        $result = new self();

        foreach ($json_obj as $k => $v) {
            if ($k = ErrorDescriptor::name()) {
                $result->errorDescriptor = ErrorDescriptor::createFromJSON($v);
            }
            $result->$k = $v;
        }
        return $result;

    }

} 