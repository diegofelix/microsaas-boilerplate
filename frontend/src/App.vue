<template>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Battleroad - De olho nos campeões!</title>
        <!-- Include Tailwind CSS -->
        <link href="/path-to-your-tailwind.css" rel="stylesheet">
    </head>
        <body class="bg-gray-950 flex flex-col h-svh">

            <div class="flex-grow">
                <nav class="bg-gray-800 p-4 text-white">
                    <div class="container mx-auto flex justify-between">
                        <a href="#" class="text-xl font-bold">Battleroad</a>
                        <div class="flex space-x-4">
                            <a href="#" class="hover:text-gray-300">Home</a>
                            <a href="#" class="hover:text-gray-300">Campeonatos</a>
                            <a href="#" class="hover:text-gray-300">Jogadores</a>
                            <a href="#" class="hover:text-gray-300">Ranking</a>
                        </div>
                    </div>
                </nav>

                <section class="bg-black text-white p-16">
                    <div class="container mx-auto flex justify-between items-center">
                        <div>
                            <h1 class="text-5xl font-bold mb-4">Gerencie seus campeonatos</h1>
                            <p class="mb-8">Uma plataforma completa para competidores e organizadores de campeonatos</p>
                            <a href="#" class="bg-yellow-500 text-black px-4 py-2 rounded">Leia mais</a>
                        </div>
                    </div>
                </section>

                <section class="container mx-auto p-8">
                    <h2 class="text-3xl font-bold mb-6">Próximos campeonatos</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="font-bold text-xl mb-2">BRKumite</h3>
                            <a href="#" class="bg-yellow-500 text-black px-4 py-2 rounded block text-center mt-4">Entre agora!</a>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="font-bold text-xl mb-2">Circuito Silva Games</h3>
                            <a href="#" class="bg-yellow-500 text-black px-4 py-2 rounded block text-center mt-4">Entre agora!</a>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h3 class="font-bold text-xl mb-2">Battle Coliseum</h3>
                            <a href="#" class="bg-yellow-500 text-black px-4 py-2 rounded block text-center mt-4">Entre agora!</a>
                        </div>
                    </div>
                </section>
            </div>

            <footer class="bg-gray-800 text-white p-4">
                <div class="container mx-auto text-center">
                    <p>&copy; 2024 Battleroad</p>
                </div>
            </footer>

        </body>
    </html>
</template>
<script setup>
</script>
