@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fantasy Forge</title>


        <!-- Styles -->
        <style>
          body {
            background-image: url('{{ asset('storage/images/Midjourney_LoginPage.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }html, body {
            height: 100vh;
        }
        .fantasy-forge-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 100%;
            height: auto;
            animation: breathe 4s infinite ease-in-out;
        }

        @keyframes breathe {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
            }
            50% {
                transform: translate(-50%, -50%) scale(1.07);
            }
        }
</style>
    </head>
    <body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <img src="storage/images/FantasyForge.png" alt="Fantasy Forge Logo" class="fantasy-forge-logo">
</html>
