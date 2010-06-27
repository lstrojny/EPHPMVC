<?php
namespace EPHPMVC;
/**
 * The response is protocol agnostic again. We define two generic errors, routing errors and processing errors. This
 * errors would be implement protocol specific for HTTP, console and every other protocol we wish to speak. A response
 * indicates quite generically that it is the result of an errornous dispatch process. When the response has been
 * completed the view is passed to render the output.
 */
interface ResponseInterface
{
    public function raiseProcessingError();
    public function raiseRoutingError();
    public function isError();
    public function send(ViewInterface $view);
}
