@extends('layouts.base')
    <h1>Custom blade directive</h1>
    {{--<p>@getDateTime</p>--}}

    @disk('local')
        <p>The application is using the local disk... </p><br/>
    @elsedisk('s3')
        <p>The application is using the s3 disk...</p><br/>
    @else
        <p>The application is using some other disk...</p><br/>
    @enddisk


    @mailer('smtp')
        <p>The application is using the smtp mailer...</p><br/>
    @else
        <p>The application is using some other mailer...</p><br/>
    @endmailer

    @unlessmailer('smtp')
        <p>The application is not using any mailer...</p><br/>
    @else
        <p>The application is using smtp...</p><br/>
    @endmailer
