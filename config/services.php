<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'firebase' => [
        'type'           => 'type',
        'project_id'     => 'live-all-in-17081',
        'private_key_id' => '48f6cffe8826b6c32144e8ae6d33e58988ef8dcb',
        'private_key'    => '----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCTJBhgeZSuT+12\n3lYfOtrLT0m+DRnjpdWhKaCNRQcsP/YitON8j//X4Je82JrseeJpW/c2huLLYC57\nBUfWCB20ugpEg+JaN/mchu29T1zuVpG+INK12ugvV/3IXPlTxG+PvjoSgxOTNwsM\nEC4/eRyCAdYa0k/VfQ8ByM46H8KALYTCpzR+Pa6DBvzk6NnXpd3b0CZFa4T7NWLH\np58t+K7qsB8w6D8BrbCsy8rYS/b1Ri3NozNNLQo1Hpxq7Faqi11pH91YZFNv8QH1\nvvqMqxTjteurcLPcjW6L+JHliXDFUaZmOSpi7Z/FcEssfzq5Fjj3ARg6G9oPHyHi\nx8oH9/kxAgMBAAECggEAJ0gDmf3bS43a/1jr9PppXs2UCkDFIJktJxFN42kCOTX6\nJ9nSwXZP/vneiHPrKCaB407B+LSZ52GOBxmpy+HuzEi+ZPwweZVn9fmvjlKZpKdH\n0VJB7nq6cakz/0GS7mIKxn0qU7baivqu4FGRhzB2A98poY9z8LKqRves1qeT7VPR\nz0eyZw2+bEXwEvz64R0B9wxbtWjjOiVJMwPtw83Y4GHYaUZd8YMb2KhJ8x3eOUvT\nU5GQwbvW1D6Uv/oHc7Z9+XlT1RApyou5vt7m1Gxo6Yoyl/hkuLgtmv8iJaB78g0+\nwoKk82UtU+vVrga+Xk5c3o8LsyAGV5YLlhrZE/i/4QKBgQDMsHF+iJU1/BU0eIe3\nBaKr9U4g2/DLXlFE8Vzx3jZIr2ojRjLd4c2F67O73ZwOgr2tXStuJrWgi5iop6VA\n9TseVxclvQ1n1ybcEO3lD7XZiGZHi3AeWVGi4El6eFX2sAvnbnuNLDvyd4B8sajk\n/vUGkn8uhTfacegpiD2PoPj+AwKBgQC4Bplq1A+iK1fomZscDx30nwL5zDTzZNBm\n/gP204LFEn+QTB3N3uUBQvcCwXMi/L7dY98REiYNEfl4pEaf+8+T76FHm7/Rkidg\n2gnFuYuR4/x4qm9d5SMfFaqvaWq0OPT3RmGd095DtFfYZv177iZq+bIbTmmneian\nLHFsoubPuwKBgEOYxXJfEr+oRyxz3YXgs48MTMfnOoc+16Hn/6TUmKK6Y1fQ1/2U\nk3X1l/6jueTE4nT9Ptl6qSKi10BjVNy139cuNbO90k6HrAqjAJ1T6d8z/2sDLnyn\nTKF4Zmuuj90O2G+OefjuMcHqGyGS3k75r9uCx8OKNR7L3TrSBlqHc5MXAoGBALXY\nx5eaEAzHWeoeh/j1Mzu8OduQIC73yzxK/K3Wmp2VRvrXTIhYHuHdQ2u0r8q+CPmK\nrC4ZSgKWZXgClUuYMKpWHIA/dxBnpYP+UbPSQwoaSS0P9lbJi6g25+DIgcmvktoa\n8XFdoIA04K2WMBxb3BjPv2FeXedCPJnrv/WDECPrAoGAci/Tb1frlb8E6Wcz6fH9\nVqEs6RIMLUnMxzXUE0vOoBrCPVRhg4WL7njSl6j8EaNsanXJVfdHWjwVUNvh1bJB\n6jhQds+VyCVW5wvdEp2EejDUGswE1Ds76hB9k8JIADe4yUc4vW7QGCtCghJuo76Z\n88Y8T+2v0+L7ia+j01L1ixw=\n-----END PRIVATE KEY-----\n',
        'client_email' => 'firebase-adminsdk-p5k2i@live-all-in-17081.iam.gserviceaccount.com',
        'client_id'    => '116727524797533605976',
        'auth_uri'     => 'https://accounts.google.com/o/oauth2/auth',
        'token_uri'    => 'https://oauth2.googleapis.com/token',
        'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
        'client_x509_cert_url' => 'https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-p5k2i%40live-all-in-17081.iam.gserviceaccount.com',
    ],

];
