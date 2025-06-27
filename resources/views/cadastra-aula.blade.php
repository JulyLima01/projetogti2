@vite(['resources/css/app.css', 'resources/js/app.js'])

<x-topo></x-topo>

<section class="bg-white dark:bg-gray-900">
  <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Cadastro de Aulas</h2>
      <form action="{{route('salva-aula')}}" method="POST">
        @csrf
          <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                  <input type="name" name="nome" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nome do Curso" required="">
              </div>
              <div class="w-full">
                  <label for="periodo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periodo</label>
                  <input type="periodo" name="periodo" id="periodo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Período" required="">
              </div>
              <div class="w-full">
                  <label for="professor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Professor</label>
                  <input type="professor" name="professor" id="professor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Professor" required="">
              </div>
                <div class="w-full">
                  <label for="quantidade de aulas por semestre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantidade de aulas por semestre</label>
                  <input type="quantidade de aulas por semestre" name="qtdAulas" id="quantidade de aulas por semestre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Quantidade" required="">
              </div> 
    
          </div>
          <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
              Add product
          </button>
          <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800">Cadastrar</button>

      </form>
  </div>
</section>