<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class BootstrapExtendedTemplate.
 * Uses default Bootstrap markdown for flash messages.
 */
class BootstrapExtendedTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="alert alert-%s alert-dismissible fade show" role="alert"><div class="alert-icon alert-icon-%s"></div>%s <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><div class="alert-close"></div></span></button></div>';

    /**
     * Override base function to suite Bootstrap 3 alert naming.
     *
     * @param $messages - message text
     * @param $type - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages($messages, $type)
    {
        $type = ($type == 'error') ? 'danger' : $type;
        $type = ($type == 'default') ? 'primary' : $type;

        return sprintf($this->getWrapper(), $type, $messages);
    }
}
