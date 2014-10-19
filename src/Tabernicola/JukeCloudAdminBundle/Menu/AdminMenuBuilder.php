<?php

namespace Tabernicola\JukeCloudAdminBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Tabernicola\JukeCloudAdminBundle\Event\ConfigureMenuEvent;

class AdminMenuBuilder extends ContainerAware{

    protected $translation_domain = 'Admin';

    public function mainMenu(FactoryInterface $factory, array $options) {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('id' => 'main_navigation', 'class' => 'nav navbar-nav'));
        
        $menu->addChild('Songs',array('route'=>'Tabernicola_JukeCloudAdminBundle_Song_list'));
        $menu->addChild('Disks',array('route'=>'Tabernicola_JukeCloudAdminBundle_Disk_list'));
        $menu->addChild('Artists',array('route'=>'Tabernicola_JukeCloudAdminBundle_Artist_list'));
        $menu->addChild('Users',array('route'=>'Tabernicola_JukeCloudAdminBundle_User_list'));
        
        //Dispatch configure event to allow the menu to be extended
        $this->container->get('event_dispatcher')->dispatch(ConfigureMenuEvent::CONFIGURE, new ConfigureMenuEvent($factory, $menu));
                
        return $menu;
    }

}
