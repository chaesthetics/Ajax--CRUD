<html>
<head>
@vite(['resources/css/app.css','resources/js/app.js'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
<title>Crud operation</title>
</head>
<body>
    <h1 class="font-semibold text-2xl text-gray-600 ">CRUD operation using laravel 10 and Ajax</h1>
    <div class="Main-Card h-auto w-9/12 flex-col ml-auto mr-auto justify-center items-center mt-[30px] shadow-xl">
        <div class="flex bg-neutral-800 justify-between">
            <h1 class="font-semibold text-xl text-slate-100 flex items-center pl-5 pt-2 pb-2">Manage Students<h1>    
        <!-- Modal toggle -->
        <button id="addDataToggle" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block text-white bg-blue-700 hover:bg-blue-800 mr-5 mt-5 mb-5 pt-2 pb-2 focus:outline-none font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add Student
        </button>

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add New Student</h3>
                        <form class="space-y-1" id="add_student" action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex justify-between">
                                <div>
                                    <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                                    <input type="text" name="fname" placeholder="Enter firstname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                                </div>
                                <div>
                                    <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                                    <input type="text" name="lname" placeholder="Enter lastname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                                </div>
                                </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="text" name="email" placeholder="Enter email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                            </div>
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                <input type="text" name="phone" placeholder="Enter phone number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                            </div>
                            <div>
                                <label for="course" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
                                <input type="text" name="course" placeholder="Enter course" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                            </div>
                            <div>
                                <label for="avatar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Avatar</label>
                                <input type="file" name="avatar" class="h-10 text-xs" required>
                            </div>
                            <button type="submit" id="add_student_btn" class="w-full text-white bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Data</button>
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                Any problem? <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Contact Admin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        </div>
        <div>
            <h1 class="font-bold flex justify-center text-gray-700 text-3xl">...<h1>
        </div>
    </div>
<!-- import sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- import the jquery    -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Add New Student ajax request -->
<script>
    $("#add_student").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_student_btn").text('Saving...');
        $.ajax({
            url: '{{ route('store') }}',
            method: 'post',
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            complete: function(res){
                if(res.status == 200){
                    Swal.fire(
                        'Added!',
                        'Student Added Successfully!',
                        'success'
                    )
                }
                $("#add_student_btn").text('Add student');
                $("#add_student")[0].reset();
                $("#addDataToggle").click();
            }
        });
    })
</script>

</body>
</html>