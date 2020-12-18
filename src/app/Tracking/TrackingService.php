<?php


namespace App\Tracking;


use App\Tracking\Repositories\BadDomainRepositoryInterface;
use App\Tracking\Repositories\ClickRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class TrackingService implements TrackingServiceInterface
{
    protected $badDomainRepository;
    protected $clickRepository;

    public function __construct(BadDomainRepositoryInterface $bd, ClickRepositoryInterface $c)
    {
        $this->badDomainRepository = $bd;
        $this->clickRepository = $c;
    }

    /**
     * Process click data and return array with result values
     *
     * input array [
     *          'ip'        string  client IP Address
     *          'ua'        string  client User Agent
     *          'ref'       string  Request Referer
     *          'param1'    string  GET parameter 'param1'
     *          'param2'    string  GET parameter 'param2'
     * ]
     *
     * output array [
     *          'id'    string  ID of row which corresponds to given data (just created or already existed)
     *          'error' string  Error message in case if data is correct but for the business logic its invalid
     * ]
     *
     * @param array $data
     * @return array
     */
    public function trackClick(array $data): array
    {
        $result = [];
        $badDomain = $this->getBadDomain($data);
        $click = $this->getDuplicateClick($data);

        if (!$click) {
            $click = $this->clickRepository->create($data);
        } else {
            $result['error'] = "The entry already exists in table";
        }

        if ($badDomain != null) {
            $result['error'] = "Domain $badDomain is bad";
            $result['redirect'] = 'http://google.com';
            $click->bad_domain = 1;
        }

        if (!empty($result['error'])) {
            $click->error += 1;
        }

        $this->clickRepository->save($click);

        $result['id'] = $click->id;
        return $result;
    }

    protected function getDuplicateClick(array $data): ?Model
    {
        return $this->clickRepository->searchForDuplicate(
            $data['ip'] ?? null,
            $data['ua'] ?? null,
            $data['ref'] ?? null,
            $data['param1'] ?? null
        );
    }

    /**
     * Returns the name of a bad domain which is suitable for reference URL
     * @param array $data
     * @return string|null
     */
    protected function getBadDomain(array $data): ?string
    {
        if (empty($data['ref'])) {
            return null;
        }

        $host = parse_url($data['ref'], PHP_URL_HOST) ?: $data['ref'];
        if (strpos($host, 'www.') === 0) {
            $host = substr($host, 4);
        }

        foreach ($this->badDomainRepository->findBySubdomain($host) as $item) {
            return $item->name;
        }

        return false;
    }
}
