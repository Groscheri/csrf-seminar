<?php
// csrf class

class csrf {

    const SECRET_KEY = 'a0e605ee21f0b7bdd85ff2edb8177dcf'; // 16 bytes key
    const SEPARATOR = '$'; // mustn't be a base64 characters i.e. not from [0-9a-zA-Z/=+]

    public static function generate_signed_token($size = 64) {
        $token = self::generate_token($size);
        $signed_token = self::sign_token($token);
        return $token . self::SEPARATOR . $signed_token;
    }

    private static function sign_token($token) {
        return hash_hmac('sha512', $token, self::SECRET_KEY);
    }

    public static function check_signed_token($received_token) {
        // split
        list($token, $signature) = explode(self::SEPARATOR, $received_token);
        $signed_received_token = self::sign_token($token);
        return $signature === $signed_received_token;
    }

    // obsolete
    private static function encrypt($message) {
        /*
        1- Generate an IV
        2- Encrypt message in AES-128 using SECRET_KEY
        3- Return ciphertext concatenated with generated IV in base64
        */
        // generate IV
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

        // encrypt with AES-128
        $cipher = mcrypt_encrypt(MCRYPT_RIJNDAEL_128,
                                 self::SECRET_KEY,
                                 $message,
                                 $iv);

        // encode in base64
        return base64_encode($iv . $cipher);;
    }

    // obsolete
    private static function decrypt($cipher) {
        /*
        1- Decode the base64 encoding
        2- Split IV and cipheretext
        3- Decrypt message
        */
        // decode base64
        $iv_cipher = base64_decode($cipher);

        // split IV and ciphertext
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_RAND);
        $iv = substr($iv_cipher, 0, $iv_size); // first `iv_size` bytes
        $ciphertext = substr($iv_cipher, $iv_size); // all bytes after `iv_size`

        // decrypt
        $message = mcrypt_decrypt(MCRYPT_RIJNDAEL_128,
                                  self::SECRET_KEY,
                                  $ciphertext,
                                  MCRYPT_MODE_CBC,
                                  $iv);
        return $message;
    }

    public static function generate_token($size = 128) {
        // generate a token with `size` bytes
        return base64_encode(openssl_random_pseudo_bytes($size));
    }

    public static function check($token, $session_token) {
        return $token === $session_token;
    }

    // obsolete
    private static function sha512($value) {
        // return SHA-512 hash value in hexadecimal (128 bits)
        return hash('sha512', $value);
    }
}
