<?php

namespace App\Services;

use Firebase\JWT\JWT;

class GoogleWalletService
{
    protected array $serviceAccount;

    public function __construct()
    {
        $this->serviceAccount = [
            'client_email' => 'animal@celtic-truck-367409.iam.gserviceaccount.com',
            'private_key'  => "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDjBArRokwyft5W\nyUTG2n0SmEIbCIsvD5OMw3ZFt58TtKgeb0QP2K0znc/ivZ/0eDAsTrQtvVm+YVv2\n5T9yDWncFq+X85aiX2HN6kWOc/X09ZU3RIfZgNTahM1RfjxYd//ySfzhW6t/8niM\nmrTNFldHrm2EhetawOemRtm8oObga1Eq/XAM4iAfpttvg4nMSe7i5mvdy1cPKzCZ\nGXXCkMIHY9+OvEtjVE6lqI78r+mmLWDQgvaod76rrE7YyNcfVDAbLI9bR+2e10RB\nzatdi5m2jl1PAyxR+JZU937bgy1EwMHBKMnS+WvSUSmAOtMYMRSJBqZHiNRXX4Oa\n1+StmUBRAgMBAAECggEAaAruOm27pljm5beQweJY+DC3+1PLFmJ5KUZb6k/hpFJj\nyq8L7odLuiBVqoFl0dFTorrfcSca/ln4oAspLMhg//GVwHpvSzOTy5/XCRa0XvQ+\n0vmhmVmmNBAxWWwVlCZLM2wdbdtpmlYyUZ6Fxoi6r6uNnfMSjqFiiZ5nJEBKEAfC\nFhCjVnf6pRpj83ImO+JvQGHmjowvvX4qXjjXB1LnNpqFp9i+WsZevHKkp9gBba3W\ni8bKkJ+DJ88DTV+FqY9XFaZfwVU+QyCXguJmlBm+wPHbPrzhjRT9Ud/i8UN14dSk\nJBBausyXMRE0SQUWoT7xKlsC6uuYuSfa0JPBlSuJ0QKBgQD8EKzh1CJyJxV5NuFH\nc/wztFr+F4RowQZopfEQRVsmrMH8NIxGgBBReqYhhG0Sgk2BVooPRTO6CoNgNkKa\nsWB7QoBQaMhsoHeGaxIpNhPuzzHUqabYKFd1dMcz0kPdcVkkvg8nio9I5f8iHHjh\nX1YuWfMUBWgiJI92yXTAAV8aLwKBgQDmj0M2pVbEh+rvfAz8+84hb2DssmC4JvSK\nnUBrwr3RjFMHtW66+r/EAU19XqbsxkNRke2H99Kg6jxN4sO2gVeOwbdZGUCszJvb\nrJPy4GHKPvCPu2rZg/PiZN223FO9juz3USIq1IpNfYz/SnMF8/31r1SklWTiS+ZY\nxavyPf8tfwKBgEZjbbOeZoQUD/YKcjxe0jWqDqLX9FzAUkbU2A1gIMUbBwyjq+xg\nBK6MHmpLrZ22j2gnv2PmQjyYhPlQDadfEv84odZSfG2BHf+GVMr3U/ejGlo1iebg\n1RNyqdH5zIPBDFCrVlYHZl3IBEgFRWhCFDHbYnrby6mFJh7YwOaBO4p3AoGBAKbu\n1ZCMV+2GJ5FsNQ861j2ZIglfAe5zrh1qzAj6AGvnePqc3+abxRsKgmuii6PlzToT\nOXN3+NYvoqgV5vSOY7HmCnWFdjFnF/YO1zRESCmiNpUq8qs5Ae1KcMmEb1FRWbub\nz+xI5TZEEEGLSwrlZVxsrRFZZaj/oXFm9h83yjnLAoGAICbEV0InEqQZI9DI0DLU\no8bRh8guIh34fr9fhu3NdpMTGjjbTybtQ5XX+2C2uRgzrOvCkoUC8/v1Miwlmx57\nKgGtt4pWGUqHuzb5MhsXSNBVHshQQ8a/aCI+FdGMh8ysztvTeSBHpf0uL4EyrjIL\nIZyJjJxuI0aAaDXNCDMGfd4=\n-----END PRIVATE KEY-----\n",
        ];
    }

    public function generateWalletJwt()
    {
        // Convert escaped \n to real line breaks
        $privateKey = str_replace("\\n", "\n", $this->serviceAccount['private_key']);

        $payload = [
            'iss' => $this->serviceAccount['client_email'],
            'aud' => 'google',
            'typ' => 'savetowallet',
            'payload' => [
                'genericObjects' => [
                    [
                        'id'   => 'your-project-id.your-pass-id',
                        'classId' => 'your-project-id.your-class-id',
                        'logo' => [
                            'sourceUri' => ['uri' => 'https://example.com/logo.png']
                        ],
                        'hexBackgroundColor' => '#4285F4'
                    ]
                ]
            ]
        ];

        return JWT::encode($payload, $privateKey, 'RS256');
    }
}

