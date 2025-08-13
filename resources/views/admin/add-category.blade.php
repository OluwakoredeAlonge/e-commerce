@extends('layouts.dashboard')

@section('title', isset($category) ? 'Edit Category' : 'Add Category')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 p-6">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">{{isset($category) ? 'Edit Category' : 'Add New Category'}}</h2>
      <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
        <form id="addCategoryForm" class="space-y-6" method="post" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}">
          @csrf
         @if (isset($category))
            @method('put')
         @endif
          <div>
            <label for="categoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
            <div class="mt-1 relative">
              <input type="text" id="categoryName" name="categoryName" required class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('categoryName', $category->name ?? '') }}">
              <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            @error('categoryName')
              <p class="error-message">{{$message}}</p>
            @enderror
          </div>
          <div class="flex justify-end space-x-4 mt-4">
            <a href="categories.html" class="flex items-center space-x-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
              <span>Cancel</span>
            </a>
            <button type="submit" class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
              <span>{{isset($category) ? 'Update Category' : 'Add Category' }}</span>
            </button>
          </div>
        </form>
      </div>

      <!-- Categories Table -->
      <h3 class="text-xl font-semibold text-gray-800 mb-4">Available Categories</h3>
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S/N</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
      </thead>

      <tbody class="bg-white divide-y divide-gray-200">
        @forelse($categories as $category)
          <tr>
            {{-- Serial number across pages:
                 (currentPage - 1) * perPage + loop iteration --}}
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}
            </td>

            {{-- Change 'name' below to your column name if different (e.g. category_name) --}}
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ $category->name }}
            </td>

            <td class="px-6 py-4 whitespace-nowrap text-sm">
              <div class="flex items-center space-x-3">
                <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                  <!-- edit SVG -->
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                  </svg>
                </a>

                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                    <!-- trash SVG -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4M3 7h18"></path>
                    </svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
              No categories found.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  {{-- Pagination links (Tailwind-styled by Laravel) --}}
  <div class="mt-4">
    {{ $categories->links() }}
  </div>
      </div>
    </div>
  </div>
@endsection