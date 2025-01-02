<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12 px-5 " >
    <div class="overflow-x-auto">
  <table class="table text-black">
    <!-- head -->
    <thead>
      <tr class="text-black">
        <th>Gambar</th>
        <th>Role</th>
        <th>Username</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <!-- row 1 -->
      <tr>
        <td>
          <div class="flex items-center gap-3">
            <div class="avatar">
              <div class="mask mask-squircle h-12 w-12">
                <img
                  src="https://img.daisyui.com/images/profile/demo/2@94.webp"
                  alt="Avatar Tailwind CSS Component" />
              </div>
            </div>
        </td>
        <td>{{ $user->user_type }}</td>
        <td>
        {{ $user->name }}
        </td>
        <td>{{ $user->email }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
    </div>
</x-app-layout>
