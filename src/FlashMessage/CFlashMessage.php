<?php

namespace frjf14\FlashMessage;

class CFlashMessage
{
    use \Anax\DI\TInjectable;

    private function addMessage($message, $type) {

        $flashMessages = $this->session->get('flashmessages');

        $flashMessage = [
            'message' => $message,
            'type' => $type,
        ];

        $flashMessages[] = $flashMessage;

        $this->session->set('flashmessages', $flashMessages);
    }

    public function addError($message) {

        $this->addMessage($message, 'error');
    }

    public function addSuccess($message) {

        $this->addMessage($message, 'success');
    }

    public function addNotice($message) {

        $this->addMessage($message, 'notice');
    }

    public function addWarning($message) {

        $this->addMessage($message, 'warning');
    }

    public function deleteMessages() {

        $this->session->set('flashmessages', []);
    }

    public function getFlashMessages() {

        $messages = $this->session->get('flashmessages');

        $html = "";

        foreach ($messages as $message) {

            $html .= "<div id='flashMessage' class='" . $message['type'] . "'>" . $message['message'] . "</div>";
        }

        $this->deleteMessages();

        return $html;
    }
}


