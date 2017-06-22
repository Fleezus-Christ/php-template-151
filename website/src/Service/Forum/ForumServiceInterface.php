<?php

namespace mineichen\Service\Forum;

interface ForumServiceInterface 
{
    public function getCategories();
    
    public function newTopic($title, $content, $category, $anonymous);
}
