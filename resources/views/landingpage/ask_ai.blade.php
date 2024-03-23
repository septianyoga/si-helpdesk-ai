@extends('layouts/main')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Chat
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl" style="height: 35rem !important;">
            <div class="card">
                <div class="row g-0">
                    {{-- <div class="col-12 col-lg-5 col-xl-3 border-end">
                        <div class="card-header d-none d-md-block">
                            <div class="input-icon">
                                <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                        <path d="M21 21l-6 -6" />
                                    </svg>
                                </span>
                                <input type="text" value="" class="form-control" placeholder="Search…"
                                    aria-label="Search" />
                            </div>
                        </div>
                        <div class="card-body p-0 scrollable" style="max-height: 35rem">
                            <div class="nav flex-column nav-pills" role="tablist">
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3 active" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar"
                                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Paweł Kuna</div>
                                            <div class="text-secondary text-truncate w-100">Sure Paweł, let me pull the
                                                latest updates.</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar">JL</span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Jeffie Lewzey</div>
                                            <div class="text-secondary text-truncate w-100">I'm on it too 👊</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar"
                                                style="background-image: url(./static/avatars/002m.jpg)"></span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Mallory Hulme</div>
                                            <div class="text-secondary text-truncate w-100">I see you've refactored the
                                                <code>calculateStatistics</code> function. The code is much cleaner now.
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar"
                                                style="background-image: url(./static/avatars/003m.jpg)"></span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Dunn Slane</div>
                                            <div class="text-secondary text-truncate w-100">Yes, I thought it was getting a
                                                bit cluttered.</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar"
                                                style="background-image: url(./static/avatars/000f.jpg)"></span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Emmy Levet</div>
                                            <div class="text-secondary text-truncate w-100">The commit message is
                                                descriptive, too. Good job on mentioning the issue number it fixes.</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar"
                                                style="background-image: url(./static/avatars/001f.jpg)"></span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Maryjo Lebarree</div>
                                            <div class="text-secondary text-truncate w-100">I noticed you added some new
                                                dependencies in the <code>package.json</code>. Did you also update the
                                                <code>README</code> with the setup instructions?</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar">EP</span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Egan Poetz</div>
                                            <div class="text-secondary text-truncate w-100">Oops, I forgot. I'll add that
                                                right away.</div>
                                        </div>
                                        <div class="col-auto">🌴</div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar"
                                                style="background-image: url(./static/avatars/002f.jpg)"></span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Kellie Skingley</div>
                                            <div class="text-secondary text-truncate w-100">I see a couple of edge cases we
                                                might not be handling in the <code>calculateStatistic</code> function.
                                                Should I open an issue for that?</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar"
                                                style="background-image: url(./static/avatars/003f.jpg)"></span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Christabel Charlwood</div>
                                            <div class="text-secondary text-truncate w-100">Yes, Bob. Please do. We should
                                                not forget to handle those.</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#chat-1" class="nav-link text-start mw-100 p-3" id="chat-1-tab"
                                    data-bs-toggle="pill" role="tab" aria-selected="true">
                                    <div class="row align-items-center flex-fill">
                                        <div class="col-auto"><span class="avatar">HS</span>
                                        </div>
                                        <div class="col text-body">
                                            <div>Haskel Shelper</div>
                                            <div class="text-secondary text-truncate w-100">Alright, once the
                                                <code>README</code> is updated, I'll merge this commit into the main branch.
                                                Nice work, Paweł.</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12 col-lg-12 col-xl-12 d-flex flex-column">
                        <div class="card-body scrollable" style="height: 60vh;">
                            <div class="chat">
                                <div class="chat-bubbles" id="chat-messages">
                                    <div class="chat-item">
                                        <div class="row align-items-end">
                                            <div class="col-auto"><span class="avatar"
                                                    style="background-image: url(https://kb-sla.wika.co.id/uploads/images/system/2024-01/rosi-g2-text-trial.png)"></span>
                                            </div>
                                            <div class="col col-lg-6">
                                                <div class="chat-bubble">
                                                    <div class="chat-bubble-title">
                                                        <div class="row">
                                                            <div class="col chat-bubble-author">Helpdesk AI</div>
                                                        </div>
                                                    </div>
                                                    <div class="chat-bubble-body">
                                                        <p>Hai. Ada yang bisa saya bantu?</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="chat-item">
                                        <div class="row align-items-end justify-content-end">
                                            <div class="col col-lg-6">
                                                <div class="chat-bubble chat-bubble-me">
                                                    <div class="chat-bubble-title">
                                                        <div class="row">
                                                            <div class="col chat-bubble-author">Paweł Kuna</div>
                                                        </div>
                                                    </div>
                                                    <div class="chat-bubble-body">
                                                        <p>Hey guys, I just pushed a new commit on the <code>dev</code>
                                                            branch. Can you have a look and tell me what you think?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto"><span class="avatar"
                                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="chat-item d-none" id="show-type">
                                        <div class="row align-items-end">
                                            <div class="col-auto"><span class="avatar"
                                                    style="background-image: url(https://kb-sla.wika.co.id/uploads/images/system/2024-01/rosi-g2-text-trial.png)"></span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="chat-bubble">
                                                    <div class="chat-bubble-body">
                                                        <p class="text-secondary text-italic">Mengetik<span
                                                                class="animated-dots"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="input-group input-group-flat">
                                <input type="text" class="form-control" id="message-input" autocomplete="off"
                                    placeholder="Ketik pertanyaan kamu disini..." />
                                <span class="input-group-text">
                                    <a href="#" id="send-button" type="submit" class="link-secondary ms-2"
                                        data-bs-toggle="tooltip" aria-label="Kirim" title="Kirim">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/paperclip -->
                                        <span class="d-none" id="loading-icon">
                                            <div class="spinner-border spinner-border-sm text-secondary" role="status">
                                            </div>
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" id="send-icon"
                                            class="icon icon-tabler icon-tabler-send-2" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M4.698 4.034l16.302 7.966l-16.302 7.966a.503 .503 0 0 1 -.546 -.124a.555 .555 0 0 1 -.12 -.568l2.468 -7.274l-2.468 -7.274a.555 .555 0 0 1 .12 -.568a.503 .503 0 0 1 .546 -.124z" />
                                            <path d="M6.5 12h14.5" />
                                        </svg>
                                    </a>
                                </span>

                            </div>
                            <small class="form-hint text-danger d-none" id="required">*Pesan wajib diisi.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        const chatMessages = document.getElementById('chat-messages');
        const messageInput = $('#message-input').val();
        const sendButton = document.getElementById('send-button');

        $('#message-input').on('keydown', function(event) {
            if (event.key === 'Enter') {
                // Panggil fungsi atau kode yang ingin Anda jalankan saat tombol Enter ditekan
                sendMessage($('#message-input').val());
            } else {
                return;
            }
        });

        $('#send-button').on('click', function() {
            sendMessage($('#message-input').val());
        })

        function sendMessage(message) {
            $('#send-icon').addClass('d-none');
            $('#loading-icon').removeClass('d-none');
            $('#message-input').attr('disabled', 'disabled');
            if ($('#message-input').val() == '') {
                $('#required').removeClass('d-none')
                return;
            }
            $('#required').addClass('d-none')
            var messageContent = $('#message-input').val()

            // set buble
            var newChatItem = $(`
                <div class="chat-item">
                    <div class="row align-items-end justify-content-end">
                        <div class="col col-lg-6">
                            <div class="chat-bubble chat-bubble-me">
                                <div class="chat-bubble-title">
                                    <div class="row">
                                        <div class="col chat-bubble-author">Kamu</div>
                                    </div>
                                </div>
                                <div class="chat-bubble-body">
                                    <p>${messageContent}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"><span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span></div>
                    </div>
                </div>
            `);


            // Tambahkan elemen chat baru ke dalam elemen dengan id "chat-container"
            $('#chat-messages').append(newChatItem);

            $('#message-input').val('')
            var loaderType = $(`
            <div class="chat-item" id="type">
                <div class="row align-items-end">
                    <div class="col-auto"><span class="avatar"
                            style="background-image: url(https://kb-sla.wika.co.id/uploads/images/system/2024-01/rosi-g2-text-trial.png)"></span>
                    </div>
                    <div class="col-auto">
                        <div class="chat-bubble">
                            <div class="chat-bubble-body">
                                <p class="text-secondary text-italic">Mengetik<span
                                        class="animated-dots"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `)
            $('#chat-messages').append(loaderType)


            var knowledgebase = <?= $knowledgebase ?>

            // $.ajax('http://localhost:3030/tes', {
            $.ajax('https://open-ai-deploy.vercel.app/tes', {
                type: 'POST',
                contentType: 'application/json', // Set content type to JSON
                data: JSON.stringify({
                    "questions": messageContent,
                    "knowledgebase": knowledgebase
                    // "knowledgebase": [{
                    //         "id": 1,
                    //         "knowledgebase": "Hai, saya adalah ROBOT HELPDESK yang akan membantu kamu jika mengalami permasalahan yang perlu ditangani oleh TIM IT."
                    //     },
                    //     {
                    //         "id": 6,
                    //         "knowledgebase": "jika terdapat jawaban yang mengarah pada suatu link https, bungkus link tersebut dengan tag a href html. contoh <a href='letakan link disini'>nama link </a>"
                    //     },
                    //     {
                    //         "id": 2,
                    //         "knowledgebase": "Tahapan untuk mengatasi lupa password pada website Wzone: 1. Mengunjungi wzone 2. Klik tombol lupa password 3. Mengisi email. 4. Link reset password akan dikirimkan ke email anda. 5. Cek email ada secara berkala. 6. Klik link yang dikirimkan via email. 7. Masukan password baru untuk mereset password."
                    //     },
                    //     {
                    //         "id": 3,
                    //         "knowledgebase": "jika pertanyaan bukan merujuk untuk nanya, jawablah dengan ramah, dan jika pertanyaan berada diluar konteks dari data yang diberikan, berikan pesan 'Pertanyaan anda diluar konteks HELPDESK, silahkan mengajukan tiket jika dirasa perlu dijawab oleh TIM IT' serta berikan juga tombol link html yang mengarah pada link https://sla/create-ticket"
                    //     },
                    //     {
                    //         "id": 4,
                    //         "knowledgebase": "bersikaplah dengan ramah."
                    //     },
                    //     {
                    //         "id": 5,
                    //         "knowledgebase": "Divisi IT adalah divisi yang menaungi 2 departemen, yaitu departemen Sistem Informasi dan Departemen ERP (Enterprise Resource Planning). Divisi IT ini baru di dirikan pada awal januari 2023"
                    //     }

                    // ]
                }),
                success: function(response) {
                    $('#send-icon').removeClass('d-none');
                    $('#loading-icon').addClass('d-none');
                    $('#message-input').removeAttr('disabled')
                    $('#type').remove()
                    var randomId = Math.floor(Math.random() * 1000) + 1;
                    var answer = $(`
                        <div class="chat-item">
                            <div class="row align-items-end">
                                <div class="col-auto"><span class="avatar"
                                        style="background-image: url(https://kb-sla.wika.co.id/uploads/images/system/2024-01/rosi-g2-text-trial.png)"></span>
                                </div>
                                <div class="col col-lg-6">
                                    <div class="chat-bubble">
                                        <div class="chat-bubble-title">
                                            <div class="row">
                                                <div class="col chat-bubble-author">Helpdesk AI</div>
                                            </div>
                                        </div>
                                        <div class="chat-bubble-body">
                                            <p class="typing-animation" id="` + randomId + `"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                    $('#chat-messages').append(answer);
                    typingAnimation(response.answer, $('.typing-animation'));
                    $('#' + randomId).removeClass('typing-animation')
                    // $('#paste-answer').html(response.answer);
                },
                error: function() {
                    console.log('gagal');
                }
            });
        }
        // sendButton.addEventListener('click', function() {
        //     alert('ksjdf');
        // });

        function typingAnimation(text, targetElement) {
            var index = 0;

            // Menerapkan interval untuk animasi mengetik
            var typingInterval = setInterval(function() {
                targetElement.html(text.substring(0, index));
                index++;

                // Memberhentikan interval ketika selesai
                if (index > text.length) {
                    clearInterval(typingInterval);
                }
            }, 50); // Sesuaikan kecepatan mengetik sesuai keinginan
        }
    </script>
@endsection
