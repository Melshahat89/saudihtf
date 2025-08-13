<?php

// If you choose to use ENV vars to define these values, give this IdP its own env var names
// so you can define different values for each IdP, all starting with 'SAML2_'.$this_idp_env_id
$this_idp_env_id = 'futurex';

//This is variable is for simplesaml example only.
// For real IdP, you must set the url values in the 'idp' config to conform to the IdP's real urls.
$idp_host = env('SAML2_'.$this_idp_env_id.'_IDP_HOST', 'https://igtsservice.com/simplesaml');

return $settings = array(

    /*****
     * One Login Settings
     */

    // If 'strict' is True, then the PHP Toolkit will reject unsigned
    // or unencrypted messages if it expects them signed or encrypted
    // Also will reject the messages if not strictly follow the SAML
    // standard: Destination, NameId, Conditions ... are validated too.
    'strict' => true, //@todo: make this depend on laravel config

    // Enable debug mode (to print errors)
    'debug' => env('APP_DEBUG', false),

    // Service Provider Data that we are deploying
    'sp' => array(

        // Specifies constraints on the name identifier to be used to
        // represent the requested subject.
        // Take a look on lib/Saml2/Constants.php to see the NameIdFormat supported
        'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:persistent',

        // Usually x509cert and privateKey of the SP are provided by files placed at
        // the certs folder. But we can also provide them with the following parameters
        'x509cert' => env('SAML2_'.$this_idp_env_id.'_SP_x509',''),
        'privateKey' => env('SAML2_'.$this_idp_env_id.'_SP_PRIVATEKEY',''),

        // Identifier (URI) of the SP entity.
        // Leave blank to use the '{idpName}_metadata' route, e.g. 'test_metadata'.
        'entityId' => env('SAML2_'.$this_idp_env_id.'_SP_ENTITYID',''),

        // Specifies info about where and how the <AuthnResponse> message MUST be
        // returned to the requester, in this case our SP.
        'assertionConsumerService' => array(
            // URL Location where the <Response> from the IdP will be returned,
            // using HTTP-POST binding.
            // Leave blank to use the '{idpName}_acs' route, e.g. 'test_acs'
            'url' => '',
        ),
        // Specifies info about where and how the <Logout Response> message MUST be
        // returned to the requester, in this case our SP.
        // Remove this part to not include any URL Location in the metadata.
        'singleLogoutService' => array(
            // URL Location where the <Response> from the IdP will be returned,
            // using HTTP-Redirect binding.
            // Leave blank to use the '{idpName}_sls' route, e.g. 'test_sls'
            'url' => '',
        ),
    ),

    // Identity Provider Data that we want connect with our SP
    'idp' => array(
        // Identifier of the IdP entity  (must be a URI)
        'entityId' => env('SAML2_'.$this_idp_env_id.'_IDP_ENTITYID', $idp_host . '/saml2/idp/metadata.php'),
        // SSO endpoint info of the IdP. (Authentication Request protocol)
        'singleSignOnService' => array(
            // URL Target of the IdP where the SP will send the Authentication Request Message,
            // using HTTP-Redirect binding.
            'url' => env('SAML2_'.$this_idp_env_id.'_IDP_SSO_URL', $idp_host . '/saml2/idp/SSOService.php'),
        ),
        // SLO endpoint info of the IdP.
        'singleLogoutService' => array(
            // URL Location of the IdP where the SP will send the SLO Request,
            // using HTTP-Redirect binding.
            'url' => env('SAML2_'.$this_idp_env_id.'_IDP_SL_URL', $idp_host . '/saml2/idp/SingleLogoutService.php'),
        ),
        // Public x509 certificate of the IdP
        'x509cert' => env('SAML2_'.$this_idp_env_id.'_IDP_x509', 'MIIEtTCCAx2gAwIBAgIJAOijmLImc3WwMA0GCSqGSIb3DQEBCwUAMHExCzAJBgNVBAYTAlNBMQ8wDQYDVQQIDAZSaXlhZGgxDzANBgNVBAcMBlJpeWFkaDENMAsGA1UECgwETmVMQzEQMA4GA1UECwwHRnV0dXJlWDEfMB0GA1UEAwwWbmVsYy1zc28uc2h0ZWNoLmNvbS5zYTAeFw0yMTA5MTExNzE1MzFaFw0zMTA5MTExNzE1MzFaMHExCzAJBgNVBAYTAlNBMQ8wDQYDVQQIDAZSaXlhZGgxDzANBgNVBAcMBlJpeWFkaDENMAsGA1UECgwETmVMQzEQMA4GA1UECwwHRnV0dXJlWDEfMB0GA1UEAwwWbmVsYy1zc28uc2h0ZWNoLmNvbS5zYTCCAaIwDQYJKoZIhvcNAQEBBQADggGPADCCAYoCggGBAPzF20/PiFegp8/5T+iDTVOrJPoZLkT+TYnVit2q+PoGhLgiausj/XWmrIvkvF3XhWwthwgDkSR3oGJs3fZFYJy+DqilKhISZDW+oHcys0XBAeLftQgqvALuaryO7aejzgUFf/t5QN/d0bDSd7AcpKToxwE1CETnCm+b9HxbltpI2+DhRiOmH91Br8aZpHG9XAY89AJ9cx27fuoKxiO3TOhxc1Y8+Y7q82O1TBMsRgUPXlojQELogTkubJsEw7aP+zmSnO35pyN25qmRK8Z2yE+AI/6aVGIFIGfko76M07Gb0mx0uxtSWqb4YT4FuufbEhddW7e551iVkuGRV3GMXahpez/XlJWPP50Oiva/1mpjvlfKd3hKRNfOkl13onGrYRClrNAtpSV71kG9vgYiw+fjGtLO5Yr/4MKnitOyA0FFV0vBp5K6CAd3xDA8sWxNACfU1KqrGs09wm1us5OtVB25pfloBlod/Udzxa06KDpxeUf9B140sg+jyQYEiT82iwIDAQABo1AwTjAdBgNVHQ4EFgQUiwxiAFSz3huQK/mmoP+664iUTDgwHwYDVR0jBBgwFoAUiwxiAFSz3huQK/mmoP+664iUTDgwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAYEAkU+ITU4i18emvGDfxiyTlRFedy4+sJtmx27xmmfwRpNhszivtKbXxvxg1ElUecxZcosdykWLyCadO+XuqZnirXgzAwSHbFjHAK5JY2WhzK6mcW+chWmMEkdzKd+cdI0g/2LR+6Y2h4cHLmC7reFnOUGKV1vukwbVYbRuLs6fnDaO4BPgFEFfQSoP0VZuyN9Iwk3XbMaDuhSCSXV2kFbIs4UfWaoRdlv1oWwD/EKiC9AhM2cOWjbBLDtaKJAZeWVsVyuzilhskiD4OzyhnQOMIROvnhuhEFQV1/mMGjTlbJ/1kkN7Yj34HkslKmOZ4QXBAbHzqJ0h+MB8LTvEB0A+5f2PNjYPisuTHBWnh2yPR3+ktxwd5M4/ERre0F1n/6zqC/Ur1NLJddH1mnufPw3sNsUENDhPy9ADkHYF9w7o+5Lp9ZHPaxTDFXf1tdTbigxNw1kADy0aOiphVSUS4Zy/TmXT1y6MEEh5w+XT76CwLYbfAU7htMq8bPGsMQ96MNAN'),
        /*
         *  Instead of use the whole x509cert you can use a fingerprint
         *  (openssl x509 -noout -fingerprint -in "idp.crt" to generate it)
         */
        // 'certFingerprint' => '',

        /**
         * (Optional) Enable Multi-Cert signing/encryption
         * In some scenarios the IdP uses different certificates for
         * signing/encryption, or is under key rollover phase and
         * more than one certificate is published on IdP metadata.
         * In order to handle that the toolkit offers that parameter.
         * (when used, 'x509cert' and 'certFingerprint' values are
         * ignored).
         */

        //'x509certMulti'=>array(
        //    'signing'=>array(
        //      0=>env('SAML2_'.$this_idp_env_id.'_IDP_x509_SIGNING_0',''),
        //    ),
        //    'encryption'=>array(
        //      0=>env('SAML2_'.$this_idp_env_id.'_IDP_x509_ENCRYPTION_0',''),
        //    ),
        //  ),

    ),



    /***
     *
     *  OneLogin advanced settings
     *
     *
     */
    // Security settings
    'security' => array(

        /** signatures and encryptions offered */

        // Indicates that the nameID of the <samlp:logoutRequest> sent by this SP
        // will be encrypted.
        'nameIdEncrypted' => false,

        // Indicates whether the <samlp:AuthnRequest> messages sent by this SP
        // will be signed.              [The Metadata of the SP will offer this info]
        'authnRequestsSigned' => false,

        // Indicates whether the <samlp:logoutRequest> messages sent by this SP
        // will be signed.
        'logoutRequestSigned' => false,

        // Indicates whether the <samlp:logoutResponse> messages sent by this SP
        // will be signed.
        'logoutResponseSigned' => false,

        /* Sign the Metadata
         False || True (use sp certs) || array (
                                                    keyFileName => 'metadata.key',
                                                    certFileName => 'metadata.crt'
                                                )
        */
        'signMetadata' => false,


        /** signatures and encryptions required **/

        // Indicates a requirement for the <samlp:Response>, <samlp:LogoutRequest> and
        // <samlp:LogoutResponse> elements received by this SP to be signed.
        'wantMessagesSigned' => false,

        // Indicates a requirement for the <saml:Assertion> elements received by
        // this SP to be signed.        [The Metadata of the SP will offer this info]
        'wantAssertionsSigned' => false,

        // Indicates a requirement for the NameID received by
        // this SP to be encrypted.
        'wantNameIdEncrypted' => false,

        // Authentication context.
        // Set to false and no AuthContext will be sent in the AuthNRequest,
        // Set true or don't present thi parameter and you will get an AuthContext 'exact' 'urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport'
        // Set an array with the possible auth context values: array ('urn:oasis:names:tc:SAML:2.0:ac:classes:Password', 'urn:oasis:names:tc:SAML:2.0:ac:classes:X509'),
        'requestedAuthnContext' => true,
    ),

    // Contact information template, it is recommended to suply a technical and support contacts
    'contactPerson' => array(
        'technical' => array(
            'givenName' => 'name',
            'emailAddress' => 'no@reply.com'
        ),
        'support' => array(
            'givenName' => 'Support',
            'emailAddress' => 'no@reply.com'
        ),
    ),

    // Organization information template, the info in en_US lang is recomended, add more if required
    'organization' => array(
        'en-US' => array(
            'name' => 'IGTS',
            'displayname' => 'IgtsService',
            'url' => 'https://igtsservice.com'
        ),
    ),

/* Interoperable SAML 2.0 Web Browser SSO Profile [saml2int]   http://saml2int.org/profile/current

   'authnRequestsSigned' => false,    // SP SHOULD NOT sign the <samlp:AuthnRequest>,
                                      // MUST NOT assume that the IdP validates the sign
   'wantAssertionsSigned' => true,
   'wantAssertionsEncrypted' => true, // MUST be enabled if SSL/HTTPs is disabled
   'wantNameIdEncrypted' => false,
*/

);
