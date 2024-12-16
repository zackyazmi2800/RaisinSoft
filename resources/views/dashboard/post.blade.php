<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Post') }}
    </h2>
  </x-slot>

  <div class="py-12 px-5 ">
    <div class="overflow-x-auto">
      <table class="table text-black">
        <!-- head -->
        <thead>
          <tr class="text-black">
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar">
                  <div class="mask mask-squircle h-12 w-12">
                    <img src="https://img.daisyui.com/images/profile/demo/2@94.webp"
                      alt="Avatar Tailwind CSS Component" />
                  </div>
                </div>
            </td>
            <td>latestS</td>
            <td>
              Lorem, ipsum.
            </td>
            <td>Purple</td>
            <th>
              <!-- You can open the modal using ID.showModal() method -->
              <button class="btn btn-ghost" onclick="my_modal_3.showModal()">edit</button>
              <dialog id="my_modal_3" class="modal">
                <div class="modal-box bg-white">
                  <form class="grid gap-2 pe-5">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    <input type="file" class="file-input rounded-lg file-input-bordered w-full max-w-xs" />
                    <input type="text" placeholder="judul" class="input rounded-lg input-bordered w-full max-w-xs" />
                    <input type="text" placeholder="deskripsi"
                      class="input rounded-lg input-bordered w-full max-w-xs" />
                    <select class="select select-bordered w-full max-w-xs bg-white">
                      <option disabled selected>kategori</option>
                      <option>Trending</option>
                      <option>Latest</option>
                    </select>
                    <button class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </dialog>
              <button class="btn btn-ghost btn-xs">delete</button>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>