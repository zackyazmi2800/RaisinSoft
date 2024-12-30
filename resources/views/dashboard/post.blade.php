<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Post') }}
    </h2>
  </x-slot>
<!-- Menampilkan pesan sukses -->
@if (session('success'))
    <div class="alert alert-success mb-4">
        <span class="text-green-500 text-sm">{{ session('success') }}</span>
    </div>
@endif

<!-- Menampilkan pesan error -->
@if ($errors->any())
    <div class="alert alert-error mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-500 text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="py-12 px-5">
    <!-- Button Tambah Post -->
    <div class="mb-4 flex justify-end">
      <button class="btn btn-primary" onclick="document.getElementById('create-modal').showModal()">+ Tambah Post</button>
      <dialog id="create-modal" class="modal">
    <div class="modal-box bg-white">
        <!-- Form Tambah Post -->
        <form action="{{ route('dashboard.posts.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-4">
            @csrf
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="event.preventDefault(); this.closest('dialog').close();">✕</button>
            
            <div>
                <input type="file" name="image" class="file-input rounded-lg file-input-bordered w-full" required />
                @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <input type="text" name="title" placeholder="Judul" class="input rounded-lg input-bordered w-full" required />
                @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <input type="text" name="excerpt" placeholder="Excerpt" class="input rounded-lg input-bordered w-full" required />
                @error('excerpt')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <textarea name="body" placeholder="Deskripsi" class="textarea rounded-lg textarea-bordered w-full" required></textarea>
                @error('body')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            
            <button class="btn btn-primary">Tambah</button>
        </form>
    </div>
</dialog>

    </div>

    <!-- Tabel Post -->
    <div class="overflow-x-auto">
      <table class="table text-black w-full border">
        <!-- Head -->
        <thead>
          <tr class="bg-gray-200 text-black">
            <th>Gambar</th>
            <th>Judul</th>
            <th>Excerpt</th>
            <th>Deskripsi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
          <!-- Row -->
          <tr>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar">
                  <div class="mask mask-squircle h-12 w-12">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" />
                  </div>
                </div>
              </div>
            </td>
            <td>{{ $post->title }}</td>
            <td>{{ Str::limit($post->excerpt, 20) }}</td>
            <td>{{ Str::limit($post->body, 50) }}</td>
            <td>
              <div class="flex gap-2">
                <!-- Edit Button -->
                <dialog id="edit-modal-{{ $post->id }}" class="modal">
                  <div class="modal-box bg-white">
                      <form action="{{ route('dashboard.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="grid gap-4">
                          @csrf
                          @method('PUT')
                          <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="event.preventDefault(); this.closest('dialog').close();">✕</button>
                          
                          <div>
                              <input type="file" name="image" class="file-input rounded-lg file-input-bordered w-full" />
                              @error('image')
                              <span class="text-red-500 text-sm">{{ $message }}</span>
                              @enderror
                          </div>
                          
                          <div>
                              <input type="text" name="title" value="{{ $post->title }}" placeholder="Judul" class="input rounded-lg input-bordered w-full" />
                              @error('title')
                              <span class="text-red-500 text-sm">{{ $message }}</span>
                              @enderror
                          </div>
                          
                          <div>
                              <input type="text" name="excerpt" value="{{ $post->excerpt }}" placeholder="Excerpt" class="input rounded-lg input-bordered w-full" />
                              @error('excerpt')
                              <span class="text-red-500 text-sm">{{ $message }}</span>
                              @enderror
                          </div>
                          
                          <div>
                              <textarea name="body" placeholder="Deskripsi" class="textarea rounded-lg textarea-bordered w-full">{{ $post->body }}</textarea>
                              @error('body')
                              <span class="text-red-500 text-sm">{{ $message }}</span>
                              @enderror
                          </div>
                          
                          <button class="btn btn-primary">Simpan</button>
                      </form>
                  </div>
              </dialog>


                <!-- Delete Button -->
                <form action="{{ route('dashboard.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus post ini?');">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</x-app-layout>
