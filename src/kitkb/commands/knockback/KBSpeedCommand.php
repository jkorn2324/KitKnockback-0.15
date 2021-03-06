<?php

declare(strict_types=1);

namespace kitkb\commands\knockback;

use pocketmine\command\CommandSender;
use kitkb\KitKb;
use pocketmine\utils\TextFormat;

class KBSpeedCommand extends KnockbackCommand
{
    public function __construct()
    {
        parent::__construct(KitKb::KB_SPEED, "Command to edit the kb speed of the kit.");
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param string[] $args
     *
     * @return mixed
     */
    public function execute(CommandSender $sender, $commandLabel, array $args)
    {
        if(!$this->canExecute($sender, $args))
        {
            return true;
        }

        $kitManager = KitKb::getKitHandler();
        $kit = $kitManager->getKit($args[0]);
        $value = (int)$args[1];

        $kit->getKbInfo()->update(KitKb::KB_SPEED, $value);
        $kitManager->updateKit($kit);

        $sender->sendMessage(TextFormat::GREEN . "Successfully updated the kb speed of the kit.");

        return true;
    }
}