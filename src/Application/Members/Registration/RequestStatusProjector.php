<?php

declare(strict_types=1);

namespace Francken\Application\Members\Registration;

use Francken\Application\Projector;
use Francken\Application\ReadModelRepository as Repository;
use Francken\Domain\Members\Registration\RegistrationRequestId;
use Francken\Domain\Members\Registration\Events\RegistrationRequestSubmitted;
use DateTimeImmutable;
use Broadway\Domain\DomainMessage;

final class RequestStatusProjector extends Projector
{
    private $statuses;

    public function __construct(Repository $statuses)
    {
        $this->statuses = $statuses;
    }

    public function whenRegistrationRequestSubmitted(RegistrationRequestSubmitted $event, DomainMessage $message)
    {
        $this->statuses->save(
            new RequestStatus(
                $event->registrationRequestId(),
                $event->FullName()->fullName(),
                false,
                false,
                false,
                false,
                DateTimeImmutable::createFromFormat(\Broadway\Domain\DateTime::FORMAT_STRING, $message->getRecordedOn()->toString())
            )
        );
    }
}
