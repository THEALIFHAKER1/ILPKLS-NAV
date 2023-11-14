<?php
class Navbar
{
    private $links;

    public function __construct($links)
    {
        $this->links = $links;
    }

    public function render()
    {
        $navLinks = '';
        foreach ($this->links as $link) {
            $navLinks .= "
            <li>
                <a href='{$link['url']}' class=\"block py-2 px-3 text-text rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent\">{$link['text']}</a>
            </li>
            ";
        }

        return "
                <nav class=\"z-50 bg-background border-gray-200 w-full\" style=\"position: fixed; top: 0;\">
                    <div class=\" flex flex-wrap items-center justify-between mx-auto p-4\">
                        <a href=\"./\" class=\"flex items-center space-x-3 rtl:space-x-reverse\">
                                <img src=\"../Assets/Logo/Logo.png\" class=\"h-8\" alt=\"Flowbite Logo\" />
                                <span class=\"self-center text-2xl font-semibold whitespace-nowrap text-text\">ILPKLS-NAV</span>
                        </a>
                        <button data-collapse-toggle=\"navbar-default\" type=\"button\" class=\"inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600\" aria-controls=\"navbar-default\" aria-expanded=\"false\">
                                <span class=\"sr-only\">Open main menu</span>
                                <svg class=\"w-5 h-5\" aria-hidden=\"true\" xmlns=\"http://www.w3.org/2000/svg\" fill=\"none\" viewBox=\"0 0 17 14\">
                                        <path stroke=\"currentColor\" stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M1 1h15M1 7h15M1 13h15\"/>
                                </svg>
                        </button>
                        <div class=\"hidden w-full md:block md:w-auto\" id=\"navbar-default\">
                            <ul class=\"font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0\">
                                    {$navLinks}
                            </ul>
                        </div>
                    </div>
                </nav>
                <script>
                    const collapseButton = document.querySelector('[data-collapse-toggle=\"navbar-default\"]');
                    const navbar = document.querySelector('#navbar-default');

                    collapseButton.addEventListener('click', () => {
                        navbar.classList.toggle('hidden');
                        navbar.classList.toggle('block');
                    });
                </script>
                ";
    }
}
?>