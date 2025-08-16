@extends('layouts.dashboard')

@section('title', 'Add Attendant')
@section('content')
    <!-- Main Content -->
    <div class="flex-1 p-6">
      <div class="flex justify-between items-center mb-6">
        <div>
          <h2 class="text-2xl font-bold text-gray-800">Add New Attendant</h2>
          <p class="text-sm text-gray-500">Create a new attendant account to manage sales.</p>
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center space-x-2">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
          <span>Export as CSV</span>
        </button>
      </div>

   <!-- Add Attendant Form -->
<div class="bg-white shadow-lg rounded-lg p-6 mb-6 border-l-4 border-green-500">
  <form id="addAttendantForm" class="space-y-4" action="{{route('')}}">
    <div>
      <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
      <input type="text" id="fullName" name="fullName" placeholder="Enter full name" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>
    <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter email" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>
    <div>
      <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter phone number" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center space-x-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
      <span>Add Attendant</span>
    </button>
  </form>
</div>

      <!-- Search -->
      <div class="mb-6 flex flex-col md:flex-row gap-4">
        <div class="relative flex-1">
          <input type="text" id="attendantSearch" placeholder="Search by name or email..." class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
          <svg class="w-5 h-5 absolute right-3 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
      </div>

   <!-- Attendants Table -->
<div class="bg-white shadow-lg rounded-lg overflow-x-auto">
  <table class="min-w-full" id="attendantTable">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">S/N</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Full Name</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Contact</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
      </tr>
    </thead>
    <tbody id="attendantTableBody" class="divide-y divide-gray-200">
      <!-- Sample Row -->
      <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 text-sm text-gray-900">1</td>
        <td class="px-6 py-4 text-sm text-gray-900">Jane Smith</td>
        <td class="px-6 py-4 text-sm text-gray-900">
          <a href="tel:+2348012345678" class="block text-blue-600 hover:underline">+2348012345678</a>
          <a href="mailto:jane.smith@example.com" class="block text-blue-600 hover:underline">jane.smith@example.com</a>
        </td>
        <td class="px-6 py-4">
          <select class="status-select border rounded-lg p-1 focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="Active" selected>Active</option>
            <option value="Inactive">Inactive</option>
          </select>
            <a href="#" class="inline-block bg-blue-600 text-white font-semibold py-2 px-3 rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition-all duration-300 ease-in-out">Update  </a>
        </td>
        <td class="px-6 py-4 text-sm">
          <a href="#" class="text-red-600 hover:text-red-800">Delete</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
    </div>
  </div>

  <!-- JavaScript for Form Submission and Search Functionality -->
<script>
  const attendantData = [
  { fullName: 'Jane Smith', email: 'jane.smith@example.com', phone: '+2348012345678', status: 'Active' },
  { fullName: 'John Brown', email: 'john.brown@example.com', phone: '+2348098765432', status: 'Inactive' },
];

function renderTable(data) {
  const tableBody = document.getElementById('attendantTableBody');
  tableBody.innerHTML = '';
  data.forEach((attendant, index) => {
    const row = document.createElement('tr');
    row.className = 'hover:bg-gray-50';
    row.innerHTML = `
      <td class="px-6 py-4 text-sm text-gray-900">${index + 1}</td>
      <td class="px-6 py-4 text-sm text-gray-900">${attendant.fullName}</td>
      <td class="px-6 py-4 text-sm text-gray-900">
        <a href="tel:${attendant.phone}" class="block text-blue-600 hover:underline">${attendant.phone}</a>
        <a href="mailto:${attendant.email}" class="block text-blue-600 hover:underline">${attendant.email}</a>
      </td>
      <td class="px-6 py-4">
        <select class="status-select border rounded-lg p-1 focus:outline-none focus:ring-2 focus:ring-green-500">
          <option value="Active" ${attendant.status === 'Active' ? 'selected' : ''}>Active</option>
          <option value="Inactive" ${attendant.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
        </select>
      </td>
      <td class="px-6 py-4 text-sm">
        <a href="#" class="text-red-600 hover:text-red-800">Delete</a>
      </td>
    `;
    tableBody.appendChild(row);
  });
}

</script>
@endsection