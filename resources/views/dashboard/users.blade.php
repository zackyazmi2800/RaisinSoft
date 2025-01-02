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
        <td>{{ $user->user_type }}</td>
        <td>
        {{ $user->name }}
        </td>
        <td>Purple</td>
        <td>{{ $user->email }}</td>
        <th>
        <button class="btn btn-ghost" onclick="my_modal_3.showModal()">edit</button>
              <dialog id="my_modal_3" class="modal">
                <div class="modal-box bg-white">
                  <form class="grid gap-2 pe-5">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    <input type="file" class="file-input rounded-lg file-input-bordered w-full max-w-xs" />
                    <input type="text" placeholder="Nama" class="input rounded-lg input-bordered w-full max-w-xs" />
                    <input type="text" placeholder="Username"
                      class="input rounded-lg input-bordered w-full max-w-xs" />
                      <input type="email" placeholder="Email"
                      class="input rounded-lg input-bordered w-full max-w-xs" />
                    <select class="select select-bordered w-full max-w-xs bg-white">
                      <option disabled selected>role</option>
                      <option>Admin</option>
                      <option>User</option>
                    </select>
                    <button class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </dialog>
          <button class="btn btn-ghost btn-xs">delete</button>
        </th>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
    </div>
</x-app-layout>
