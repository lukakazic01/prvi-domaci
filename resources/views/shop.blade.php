<!DOCTYPE html>
<html>
@vite(['resources/css/app.css'])
<title>Shop</title>
<body>
  <div class="flex justify-center items-center mt-30">
      <div class="max-w-150 rounded border border-gray-200 p-4">
          <div class="flex justify-between text-gray-600 font-bold mb-4">
              <p>Ime</p>
              <p>Cena</p>
          </div>
          @foreach($items as $item)
              <div class="flex items-center justify-between gap-4">
                  <p class="text-gray-500">{{ $item["name"] }}</p>
                  <p class="font-bold text-gray-700">{{ $item["price"] }}$</p>
              </div>
          @endforeach
      </div>
  </div>
</body>
</html>
