<?php

class Template {
    function getContent() {
        $template = <<<EOF
<form method="post" action="app.php/submit">
    <input name="name" placeholder="Votre nom">
    <button type="submit">Envoyer</button>
</form>
EOF;

        return $template;

    }

    function postContent($request) {
        $name = $request->get('name');

        return sprintf('Bonjour %s', $name);
    }
}