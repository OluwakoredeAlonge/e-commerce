@extends('layouts.dashboard')

@section('title', 'Register Business')

@section('content')
    <!-- Main Content -->
    <div class="flex-1 p-6">
      <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Register Business</h2>
        <p class="text-sm text-gray-500">Enter your business details to customize receipts and invoices.</p>
      </div>

      <!-- Business Registration Form -->
      <div class="bg-white shadow-lg rounded-lg p-6 border-l-4 border-green-500">
        <form id="businessForm" class="space-y-6">
          <div>
            <label for="orgName" class="block text-sm font-medium text-gray-700">Organization Name <span class="text-red-500">*</span></label>
            <input type="text" id="orgName" name="orgName" required class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="e.g., Acme Electronics">
          </div>
          <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-red-500">*</span></label>
            <textarea id="address" name="address" required class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" rows="4" placeholder="e.g., 123 Main Street, Lagos, Nigeria"></textarea>
          </div>
          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number <span class="text-red-500">*</span></label>
            <input type="tel" id="phone" name="phone" required pattern="[0-9+\-\s()]{10,}" class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="e.g., +234 123 456 7890">
          </div>
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
            <input type="email" id="email" name="email" required class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="e.g., contact@acme.com">
          </div>
          <div>
            <label for="website" class="block text-sm font-medium text-gray-700">Website (Optional)</label>
            <input type="url" id="website" name="website" class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="e.g., https://www.acme.com">
          </div>
          <!-- <div>
            <label for="taxId" class="block text-sm font-medium text-gray-700">Tax ID (Optional)</label>
            <input type="text" id="taxId" name="taxId" class="mt-1 w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="e.g., VAT123456789">
          </div> -->
          <div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center space-x-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
              <span>Save Details</span>
            </button>
          </div>
        </form>
        <div id="successMessage" class="hidden mt-4 p-4 bg-green-100 text-green-700 rounded-lg">
          Business details saved successfully!
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript for Form Handling -->
  <script>
    document.getElementById('businessForm').addEventListener('submit', function(e) {
      e.preventDefault();

      // Collect form data
      const formData = {
        orgName: document.getElementById('orgName').value,
        address: document.getElementById('address').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        website: document.getElementById('website').value,
        taxId: document.getElementById('taxId').value
      };

      // Basic validation (browser validation handles required fields and formats)
      if (!formData.orgName || !formData.address || !formData.phone || !formData.email) {
        alert('Please fill in all required fields.');
        return;
      }

      // Simulate saving data (log to console; replace with API call in production)
      console.log('Business Details:', formData);

      // Show success message
      document.getElementById('successMessage').classList.remove('hidden');

      // Reset form
      this.reset();

      // Hide success message after 3 seconds
      setTimeout(() => {
        document.getElementById('successMessage').classList.add('hidden');
      }, 3000);
    });
  </script>
@endsection