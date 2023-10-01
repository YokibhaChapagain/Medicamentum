@include('user.menubar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="mx-4 mt-28 md:ml-64">
        <div class="flex items-center justify-between p-4 bg-gray-200 rounded-lg shadow-md">
            <div class="text-xl font-bold">Upload Prescription</div>
            <a href="{{url('user/dashboard')}}" class="p-2 text-white bg-blue-600 bg-greepy-2 bg rounded-xl">Back</a>
        </div>

        <div class="p-4 mt-2 bg-white rounded-lg">
            <form action="{{ url('/user/prescription-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-input" value="{{ Auth()->user()->id }}" name="user_id" hidden>
                </div>

                <div class="space-y-3 ">

                <div class="form-group">
                    <label for="note" class="block mb-2 font-bold text-gray-700">Note</label>
                    <input type="text" id="note" name="note"
                        class="form-input border p-2 rounded w-full @error('note') border-red-500 @enderror"
                        value="{{ old('note') }}">

                        @error('note')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="image1" class="block mb-2 font-bold text-gray-700">Upload Image - 01</label>
                    <input type="file" id="image1" name="image1"
                        class="form-input border  p-2 rounded w-full @error('image1') border-red-500 @enderror">

                        @error('image1')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                     @enderror
                </div>

                <div class="form-group">
                    <label for="image2" class="block mb-2 font-bold text-gray-700">Upload Image - 02</label>
                    <input type="file" id="image2" name="image2"
                        class="form-input border  p-2 rounded w-full @error('image2') border-red-500 @enderror">
                        @error('image2')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="image3" class="block mb-2 font-bold text-gray-700">Upload Image - 03</label>
                    <input type="file" id="image3" name="image3"
                        class="form-input border  p-2 rounded w-full @error('image3') border-red-500 @enderror">
                        @error('image3')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="pharmacy_id" class="block mb-2 font-bold text-gray-700">Choose Pharmacy</label>
                    <select id="pharmacy_id" name="pharmacy_id"
                            class="form-input border p-2 rounded w-full @error('pharmacy_id') border-red-500 @enderror">
                        <option value="" disabled selected>Select Pharmacy</option>
                        @foreach ($pharmacyUsers as $pharmacy)
                            <option value="{{ $pharmacy->id }}">{{ $pharmacy->user->name }}</option>
                        @endforeach
                    </select>

                    @error('pharmacy_id')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                    <div class="form-group">
                        <button type="submit" class="p-2 mr-4 text-white bg-green-500 bg-greepy-2 bg rounded-xl">Submit</button>
                        <button type="reset" class="p-2 text-white bg-red-500 bg-greepy-2 bg rounded-xl">Reset</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
