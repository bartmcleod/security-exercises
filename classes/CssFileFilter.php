<?php

class CssFileFilter extends FilterIterator
{

    /**
     * Check whether the current element of the iterator is acceptable
     * @link http://php.net/manual/en/filteriterator.accept.php
     * @return bool true if the current element is acceptable, otherwise false.
     * @since 5.1.0
     */
    public function accept()
    {
        /**
         * @var SplFileInfo $file
         */
        $file = $this->current();

        if ($file->getExtension() === 'css') {
            return true;
        }

        return false;
    }

    public function getFiles()
    {
        if (! $this->getInnerIterator() instanceof DirectoryIterator) {
            throw new DomainException("You can only use " . __CLASS__ . " with a DirectoryIteractor");
        }

        $files = [];

        /** @var SplFileInfo $fileInfo */
        foreach ($this as $fileInfo) {

            $files[] = $fileInfo->getFilename();
        }

        return $files;
    }
}
