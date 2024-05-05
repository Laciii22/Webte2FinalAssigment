<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
@vite('resources/js/dashboard-scripts.js')

@include('components.create-question-modal')
@include('components.edit-modal')



<x-modal name="qrcode-modal">
    <div id="qrcode-content-parent">
    </div>
</x-modal>



<x-app-layout>
    <!--   <div id="editModal" class="fixed inset-0 overflow-y-auto hidden " onclick="closeEditModal()">
        <div class="flex items-center justify-center min-h-screen px-4 pb-20 text-center">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="inline-block align-middle bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="modal-content">
                    <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-3">Edit Question
                    </h4>
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="px-4 py-5 sm:px-6">
                            <div class="mb-2">
                                <label for="edit-title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title</label>
                                <input type="text" name="title" id="edit-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter title" required>
                            </div>
                            <div class="mb-2">
                                <label for="edit-body" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Body</label>
                                <textarea name="body" id="edit-body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:text-white" placeholder="Enter body" required></textarea>
                            </div>
                        </div>
                        <div class=" px-4 py-4 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" onclick="submitEditForm()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-1">Save
                                Changes</button>
                            <button type="button" onclick="closeEditModal()" class="mt-3 w-full sm:mt-0 sm:w-auto bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 -->

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <button x-data class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click="$dispatch('open-modal', 'create-question-modal')">Create New Question</button>
                    <span>TUTO DOROBIT FILTRE NAMIESTO TOHOT TEXXT</span>
                </div>
            </div>
        </div>
    </div>


    @foreach($questions as $index => $question)
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">

                <h5 class="hover:text-gray-400 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="http://localhost:8000/{{$question->code}}/result">{{$question->code}}</a>
                </h5>

                @if ($question->category == "choice")
                <div class="grid gap-6 mb-2 md:grid-cols-2">
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white">Question</label>
                        <input type="text" id="body" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->title}}" disabled />

                        <div class="grid gap-6 mb-2 md:grid-cols-2">
                            <div>

                                <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white">Lesson</label>
                                <input type="text" id="body" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->lesson}}" disabled />
                            </div>
                            <div>
                                <label for="body" class="block text-sm font-medium text-gray-900 dark:text-white">Owner</label>
                                <input type="text" id="body" class="mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->user->name}}" disabled />
                            </div>
                        </div>

                        @if($question->active == 1)
                        <div class="flex items-center mb-4">
                            <input disabled id="default-checkbox" type="checkbox" checked value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active
                            </label>
                        </div>

                        @else
                        <div class="flex items-center mb-4">
                            <input disabled id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
                        </div>
                        @endif
                    </div>



                    <div>
                        @foreach($responses->where('question_code', $question->code) as $response)
                        <div class="mb-2">
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$response->value}}" disabled />
                        </div>
                        @endforeach
                    </div>
                </div>


                @else
                <div class="grid gap-6 mb-2 md:grid-cols-2">
                    <div>
                        <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Code</label>
                        <input type="text" id="code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->code}}" disabled />
                    </div>
                    <div>
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                        <input type="text" id="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{$question->body}}" disabled />
                    </div>
                </div>
                @endif

                <div class="text-gray-900 dark:text-gray-100 sm:flex gap-1 flex justify-end">
                    <button x-data @click="$dispatch('open-modal', 'qrcode-modal')" class="bg-gray-900 hover:bg-black text-white font-bold py-2 px-4 rounded qrcode-btn" data-code="{{$question->code}}">Show QR
                        code</button>
                    @if ($question->active)
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded edit-btn" data-question="{{ json_encode($question) }}" data-answers="{{ json_encode($responses->where('question_code', $question->code)->toArray()) }}" x-data @click="$dispatch('open-modal', 'edit-question-modal')">Edit</button>
                    @endif
                    <form id="deleteForm" class="m-0" action="{{ route('questions.destroy', ['question_code' => $question->code]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="question_code" value="{{ $question->code }}">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <div class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50" id="modal-{{ $question->code }}" onclick="closeModalQr('{{ $question->code }}')">
        <div class="flex items-center justify-center h-full">
            <div class="bg-white p-8 rounded-lg" onclick="event.stopPropagation()">
                <div class="qrcode-container" id="qrcode-{{ $question->code }}" data-question-code="{{ $question->code }}"></div>
                <button onclick="closeModalQr('{{ $question->code }}')" class="absolute top-0 right-0 m-4 text-gray-500 hover:text-gray-900">&times;</button>
            </div>
        </div>
    </div>

    @endforeach





</x-app-layout>

<script>
    /*     document.addEventListener('DOMContentLoaded', function() {
        createAndDisplayQRCodes();
    });

    function createAndDisplayQRCodes() {
        var questionContainers = document.querySelectorAll('.qrcode-container');
        questionContainers.forEach(function(container) {
            var questionCode = container.getAttribute('data-question-code');
            var qr = new QRCode(container, {
                text: 'http://localhost:8000/' + questionCode,
                width: 512,
                height: 512,
                colorDark: '#000000',
                colorLight: '#ffffff',
                correctLevel: QRCode.CorrectLevel.H
            });
        });
    }
 */
    /*     function openModal() {
            document.getElementById('modal').classList.add('fixed');
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('modal').classList.remove('fixed');
        }

        function openModalQr(questionCode) {
            var modal = document.getElementById('modal-' + questionCode);
            modal.classList.remove('hidden');
        }

        function closeModalQr(questionCode) {
            var modal = document.getElementById('modal-' + questionCode);
            modal.classList.add('hidden');
        } */
    /*
        var editButtons = document.querySelectorAll('.edit-button');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                var question = JSON.parse(this.getAttribute('data-question'));
                console.log(question);
                console.log(question);
                openEditModal(question);
            });
        });


        function openEditModal(question) {
            document.getElementById('edit-title').value = question.title;
            document.getElementById('edit-body').value = question.body;
            document.getElementById('editForm').action = '{{ route("questions.update", ["question" => "__question_code__"]) }}'
                .replace('__question_code__', question.code);
            document.getElementById('editModal').classList.remove('hidden');
        }


        // Funkci
        a na zatv
        orenie mo
        dálneho okna pre editáciu



        function

        closeEditModal() {
            docum
            ent.getElementById('editModal').classList.add('hidden');
        }






        // Funkcia na odoslanie formulára pre editáciu


        function submitEditForm() {
            document.getElementById('editForm').submit();
        }


        function setQuestionCode(event) {
            event.preventDefault();
            var questionCode = event.target.dataset.questionCode;
            console.log(questionCode);
            var form = document.getElementById('deleteForm');
            form
    .
            querySelector('input[name="question_code"]').value = questionCode;
            form.submit();
        }


        /*   document.addEventListener('DOMContentLoaded', function() {
              const categorySelect = document.getElementById('category');
              const inputOptions = document.getElementById('input-options');

              categorySelect.addEventListener('change', function() {
                  if (categorySelect.value === 'input') {
                      inputOptions.style.display = 'block';
                  } else {
                      inputOptions.style.display = 'none';
                  }
              });

              const addOptionButton = document.getElementById('add-option');
              if (addOptionButton) {
                  addOptionButton.addEventListener('click', function() {
                      const inputOptions = document.getElementById('input-options');
                      const inputField = document.createElement('input');
                      inputField.type = 'text';
                      inputField.name = 'input_options[]';
                      inputField.classList.add('shadow', 'appearance-none', 'border', 'rounded', 'w-full', 'py-2',
                          'px-3', 'text-gray-700', 'leading-tight', 'focus:outline-none',
                          'focus:shadow-outline', 'dark:bg-gray-700', 'dark:text-white');
                      inputField.placeholder = 'Enter option';
                      inputOptions.appendChild(inputField);
                  });
              }
          }); */
</script> */