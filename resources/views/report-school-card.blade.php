<x-report-layout title="Boletim Escolar">

    <div class="text-left my-8">
        <h1 class="text-3xl font-bold">Boletim Escolar</h1>
        <p class="text-lg mt-4"><strong>Turma</strong>: {{ $class->name }}</p>
        <p class="text-lg mt-4 "> <strong>Aluno</strong>:   {{ $student->name }}</p>

    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-left text-sm font-semibold text-gray-700">Disciplina</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-700">Nota 1</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-700">Nota 2</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-700">Nota 3</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-700">Nota 4</th>
                    <th class="py-2 px-4 border-b-2 border-gray-300 text-center text-sm font-semibold text-gray-700">Média</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $discipline => $gradeDetails)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4 border-r border-gray-300 text-left text-sm text-gray-600">{{ $discipline }}</td>
                        @foreach ($gradeDetails as $grade)
                            <td class="py-2 px-4 border-r border-gray-300 text-center text-sm text-gray-600">{{ number_format($grade['gradeCalculated'], 2) }}</td>
                        @endforeach
                        <td class="py-2 px-4 text-center text-sm font-bold text-gray-700">
                            {{ number_format(array_sum(array_column($gradeDetails, 'gradeCalculated')) / max(1, count($gradeDetails)), 2) }}
                        </td> <!-- Calculando a média -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-report-layout>
