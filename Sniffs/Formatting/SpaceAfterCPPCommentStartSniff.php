<?php
/**
 * This sniff prohibits the use of Perl style hash comments.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Steve Ramage <steve.ramage@quickmobile.com>
 */

/**
 * This sniff mandates the use of at least one space after a C++ Style comment opening.
 * "//BAD"
 * "// Good"
 *
 * 
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Steve Ramage <steve.ramage@quickmobile.com>
 */
class Symfony2_Sniffs_Commenting_SpaceAfterCPPCommentStartSniff implements PHP_CodeSniffer_Sniff
{

    /**
     * Returns the token types that this sniff is interested in.
     *
     * @return array(int)
     */
    public function register()
    {
        return array(T_COMMENT);
    }


    /**
     * Processes the tokens that this sniff is interested in.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file where the token was found.
     * @param int                  $stackPtr  The position in the stack where
     *                                        the token was found.
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        
        if (preg_match("/^\/\/\S/", $tokens[$stackPtr]['content'])) {
	   $error = "C++ Style Comments must have a space after the //";
            $data  = array(trim($tokens[$stackPtr]['content']));
            $phpcsFile->addError($error, $stackPtr, 'Found', $data);
        }
        
        
    }//end process()


}//end class

?>
