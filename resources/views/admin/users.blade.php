<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12 px-5 " >
    <div class="overflow-x-auto">
  <table class="table text-black">
    <!-- head -->
    <thead>
      <tr class="text-black">
        <th>Gambar</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
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
        <td>
        {{ $user->name }}
        </td>
        <td>Purple</td>
        <td>{{ $user->email }}</td>
        <th>
          <button class="btn btn-ghost btn-xs">Edit</button>
          <button class="btn btn-ghost btn-xs">delete</button>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
    </div>
</x-app-layout>
