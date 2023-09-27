@include('pharmacy.menubar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

</head>
<body>
    <div class="mb-10 mt-28 md:ml-96">

        <div class="flex max-w-4xl p-5 bg-white shadow-lg rounded-xl">

            <!-- Form -->
           <div class="sm:w-screen px-14">

               <h2 class="text-2xl font-bold text-[#318ECB] text-center">Add Medicine</h2>


               <form action="{{url('/pharmacy/addmedicine')}}" method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
                   @csrf
                   <input class="p-2 mt-8 border rounded-xl" type="text" id="medicinename" name="medicinename" placeholder="Medicine Name" />

                   @error('medicinename')
                   <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <textarea class="p-2 border rounded-xl" name="description" placeholder="Description"></textarea>

                   @error('description')
                   <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="flex gap-4">
                    <label class="ml-1 " for="birthday">Manufacture Date:</label>
                    <input class="p-2 text-gray-400 border rounded-xl" type="date" id="manufacture" name="manufacture">

                   @error('manufacture')
                   <span class="text-red-500">{{ $message }}</span>
                   @enderror

                   <label class="ml-16" for="birthday">Expiration Date:</label>
                   <input class="p-2 text-gray-400 border rounded-xl" type="date" id="expiration" name="expiration">

                   @error('expiration')
                   <span class="text-red-500">{{ $message }}</span>
                   @enderror

                </div>
                <div class="flex gap-4">
                    <input class="flex-grow p-2 border rounded-xl" type="number" id="price" name="price" placeholder="Price (In Nrs) " />
                    @error('price')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    <input class="flex-grow p-2 border rounded-xl" type="number" id="quantity" name="quantity" placeholder="Quantity" />
                    @error('quantity')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <label class="ml-1" for="prescription">Prescription:</label>
                <div >
                    <input class="ml-1" type="radio" id="prescription_required" name="prescription" value="1">
                    <label class="text-gray-700" for="prescription_required">Required</label>

                    <input class="ml-10" type="radio" id="prescription_not_required" name="prescription" value="0">
                    <label class="text-gray-700" for="prescription_not_required">Not Required</label>

                </div>

                @error('prescription')
                <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label class="ml-1" for="image">Upload Image:</label>
                <input class="ml-1 text-gray-500" type="file" id="image" name="image">
                @error('image')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
                <button  class="bg-[#318ECB] rounded-xl text-white py-2 my-2 mx-64 " type="submit">Submit</button>
               </form>
           </div>

           </div>
</div>
</body>
</html>
