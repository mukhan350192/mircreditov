<?php

namespace Illuminate\Http {

    class Response
    {
        /**
         * @param array $data
         * @return \Illuminate\Http\JsonResponse
         */
        public function success(array $data = []): JsonResponse
        {
            //
        }

        /**
         * @param string $message
         * @param array $data
         * @return \Illuminate\Http\JsonResponse
         */
        public function fail(string $message, array $data = []): JsonResponse
        {
            //
        }

        /**
         * @param string $message
         * @param array $data
         * @return \Illuminate\Http\JsonResponse
         */
        public function error(string $message, array $data = []): JsonResponse
        {
            //
        }
    }
}
