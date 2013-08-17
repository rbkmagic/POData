<?php
/**
 * A wrapper class over DataService class, this class will be used for
 * testing the DataService and UriProcessor classes.
 * Why this class: 
 *  The DataService::handleRequest method will be serailizing the result
 *  or exception, so testing is difficult.
 *  Instead we will use DataService2::handleRequest as this function 
 *  works same as DataService::handleRequest expect it throws exception 
 *  in case of error and return instance of UriProcessor if paring is 
 *  successful.
 */
use POData\Common\ErrorHandler;

use POData\DataService;
use POData\Common\ODataException;
use POData\UriProcessor\UriProcessor;

abstract class DataService2 extends DataService
{
  public function handleRequest()
  {
      try {
          $this->createProviders();   
          $this->getHost()->validateQueryParameters();
      } catch (\Exception $exception) {
          ErrorHandler::handleException($exception, $this);
          //TODO we are done call HTTPOUTPUT and remove exit
          exit;
      }
      

      $ObjectModelInstance = null;
      try {
          $uriProcessor = null;
          $uriProcessor = UriProcessor::process($this);          
          $this->serializeResult($uriProcessor->getRequestDescription(), $uriProcessor);
      } catch (\Exception $exception) {
          ErrorHandler::handleException($exception, $this);
          //TODO we are done call HTTPOUTPUT and remove exit
          exit;
      }
  }
}