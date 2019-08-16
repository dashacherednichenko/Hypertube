<?php

    namespace App\Exceptions;
    
    use Exception;
    use Illuminate\Validation\ValidationException;
    use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
    
    class Handler extends ExceptionHandler
    {
        /**
         * A list of the exception types that are not reported.
         *
         * @var array
         */
        protected $dontReport = [
            //
        ];
    
        /**
         * A list of the inputs that are never flashed for validation exceptions.
         *
         * @var array
         */
        protected $dontFlash = [
            'password',
            'password_confirmation',
        ];
    
        /**
         * Report or log an exception.
         *
         * @param  \Exception  $exception
         * @return void
         */
        public function report(Exception $exception) {
            parent::report($exception);
        }
    
        /**
         * Render an exception into an HTTP response.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Exception  $e
         * @return \Illuminate\Http\Response
         */
        public function render($request, Exception $e) {
            if ($request->isJson() && $e instanceof ValidationException) {
                return $this->returnFailedValidationInJson($e);
            }
            
            return parent::render($request, $e);
        }
        
        protected function returnFailedValidationInJson($e) {
            $message = $e->validator->getMessageBag()->first();
            $key = key($e->validator->getMessageBag()->toArray());
        
            return response()->json([
                'result' => false,
                'target' => $key,
                'error' => $message,
                'id' => $key . '-div'
            ], 200);
        }
    }
