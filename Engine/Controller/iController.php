<?php
    namespace Engine\Controller;
    
    interface iController
    {
        public function setView($view);
        public function getView();
    }