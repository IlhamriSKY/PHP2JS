<?php

namespace Rmunate\Php2Js\Data;

class AgentPhp2Js
{
    /**
     * Propierties Object.
     */
    private $agent;

    /**
     * Constructor Class.
     */
    public function __construct()
    {
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * Validata if is mobile the agent.
     *
     * @return bool
     */
    public function isMobileDevice(): bool
    {
        $mobileKeywords = [
            'Mobile',
            'Android',
            'iPhone',
            'iPad',
            'iPod',
            'Windows Phone',
            'BlackBerry',
            'webOS',
            'Opera Mini',
            'IEMobile',
        ];

        foreach ($mobileKeywords as $keyword) {
            if (stripos($this->agent, $keyword) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Return Name Current OS.
     *
     * @return string
     */
    public function getDataClienteSO(): string
    {
        $operatingSystems = [
            '/\bWindows\b/i'                  => 'Windows',
            '/\bMacintosh\b|Mac(?!.+OS X)/i'  => 'Mac',
            '/\bLinux\b/i'                    => 'Linux',
            '/\bAndroid\b/i'                  => 'Android',
            '/\biPhone\b|\biPad\b|\biPod\b/i' => 'iOS',
        ];

        $so = 'Unknown';
        foreach ($operatingSystems as $pattern => $os) {
            if (preg_match($pattern, $this->agent)) {
                $so = $os;
                break;
            }
        }

        return $so;
    }

    /**
     * Return Data Browser.
     *
     * @return array
     */
    public function getDataBrowser(): array
    {
        $u_agent = $this->agent;
        $bname = 'No Identificado';
        $platform = 'No Identificado';
        $version = 'No Identificado';

        // Plataforma
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'Linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'Macintosh';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'Windows';
        }

        // Navegador
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = 'MSIE';
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = 'Firefox';
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = 'Chrome';
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = 'Safari';
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = 'Opera';
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = 'Netscape';
        }

        // Número de Versión
        $known = ['Version', $ub, 'other'];
        $pattern = '#(?<browser>'.join('|', $known).')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (preg_match_all($pattern, $u_agent, $matches)) {
            $i = count($matches['browser']);
            if ($i > 0) {
                $version = $matches['version'][$i - 1];
            }
        }

        // Comprobar si tenemos una versión válida
        if ($version == null || $version == '') {
            $version = 'Desconocida';
        }

        // Validar si es Edge
        if (str_contains($this->agent, 'Edg/')) {
            $bname = 'Microsoft Edge';
        }

        $response = [
            'name'     => $bname,
            'version'  => $version,
            'platform' => $platform,
        ];

        return $response;
    }

    /**
     * Return Remote IP.
     *
     * @return string
     */
    public function getIpAddress(): string
    {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
    }

    /**
     * Return Remote Port.
     *
     * @return string
     */
    public function getRemotePort(): string
    {
        return isset($_SERVER['SERVER_PORT']) ? $_SERVER['SERVER_PORT'] : null;
    }

    /**
     * Return Remote Agent.
     *
     * @return string
     */
    public function getAgent(): string
    {
        return $this->agent;
    }
}