<?php
/**
 * Created by Rubikin Team.
 * Date: 6/6/13
 * Time: 4:01 PM
 * Question? Come to our website at http://rubikin.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Nilead\MenuBundle\Matcher\Voter;


use Knp\Menu\ItemInterface;
use Knp\Menu\Matcher\Voter\VoterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Voter based on the uri
 */
class RequestVoter implements VoterInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Checks whether an item is current.
     *
     * If the voter is not able to determine a result,
     * it should return null to let other voters do the job.
     *
     * @param ItemInterface $item
     * @return boolean|null
     */
    public function matchItem(ItemInterface $item)
    {
        if ($item->getUri() === $this->request->getRequestUri()) {
            return true;
        }

        return null;
    }
}