<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * get auth token
     */
    protected function getToken()
    {
        Artisan::call('db:seed');

        return $this->call('POST', '/api/v1/auth/login', ['identify' => 'test1@gmail.com', 'password' => '1234'])->getData()->token;
    }

    /**
     * method wrapper
     */
    protected function getMethod(string $url_, string $message_)
    {
        $this->get($url_)->seeJson(['message' => $message_]);
    }

    protected function postMethod(string $url_, string $message_, array $params_ = [])
    {
        $this->post($url_, $params_)->seeJson(['message' => $message_]);
    }

    protected function putMethod(string $url_, string $message_, array $params_ = [])
    {
        $this->put($url_, $params_)->seeJson(['message' => $message_]);
    }

    protected function deleteMethod(string $url_, string $message_)
    {
        $this->delete($url_)->seeJson(['message' => $message_]);
    }
}
