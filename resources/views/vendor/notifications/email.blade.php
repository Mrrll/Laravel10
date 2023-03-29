<x-mail::message>
    <main class="container d-md-flex flex-wrap flex-column justify-content-center align-content-center">
        <div class="card text-center">
            <div class="card-header">
                <?php
                if (!empty($greeting)) {
                    echo $greeting;
                } else {
                    if ($level === 'error') {
                        echo Lang::get('Whoops!');
                    } else {
                        echo Lang::get('Hello!');
                    }
                }
                ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    @foreach ($introLines as $line)
                        {{ $line }}
                    @endforeach
                </h5>
                <?php
                $color = match ($level) {
                    'success', 'error' => $level,
                    default => 'primary',
                };
                ?>
                <a href="{{ $actionUrl }}" class="btn btn-{{ $color }} mt-4 mb-4">{{ $actionText }}</a>
                <p class="card-text">
                    <?php
                    foreach ($outroLines as $line) {
                        echo $line;
                    }
                    ?>
                </p>
                <div class="text-start">
                    <?php
                    if (!empty($salutation)) {
                        echo $salutation;
                    } else {
                        echo Lang::get('Regards');
                        echo '<br>';
                        echo config('app.name');
                    }
                    ?>
                </div>
            </div>
            <div class="card-footer text-body-secondary text-start flex-wrap">
                <small>
                    <?php
                    echo Lang::get("If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n" . 'into your web browser:', [
                        'actionText' => $actionText,
                    ]);
                    ?>
                    <span class="break-all">({{ $actionUrl }})</span>
                </small>
            </div>
        </div>
    </main>
</x-mail::message>
