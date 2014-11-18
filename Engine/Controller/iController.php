<?php
    namespace Engine\Controller;
    use Engine\View\View;
    
    interface iController
    {
        public function setView(View $view);
        public function getView();
    }