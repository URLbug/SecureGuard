@extends('app.admin')

@section('title')
    Главная
@endsection

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <div class="text-3xl font-bold text-blue-700 mb-2">{{ $users }}</div>
            <div class="text-gray-500">Количество пользователей</div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <div class="text-3xl font-bold text-blue-700 mb-2">{{ $services }}</div>
            <div class="text-gray-500">Количество активных услуг</div>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-sm">
            <div class="text-3xl font-bold text-blue-700 mb-2">{{ $news }}</div>
            <div class="text-gray-500">Количество активных новостей</div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">User</th>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Email</th>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Role</th>
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 text-sm text-gray-800">John Doe</td>
                <td class="px-6 py-4 text-sm text-gray-800">john@example.com</td>
                <td class="px-6 py-4 text-sm text-gray-800">Administrator</td>
                <td class="px-6 py-4">
                    <button class="bg-blue-700 hover:bg-blue-800 text-white px-3 py-1.5 rounded-md text-sm">
                        Edit
                    </button>
                </td>
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
@endsection
